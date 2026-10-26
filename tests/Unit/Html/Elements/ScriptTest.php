<?php

declare(strict_types=1);

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\ReferrerPolicy;

use function Berry\Html\script;

test('script renders src async', function () {
    expect(script()->src('js')->async()->toString())->toBe('<script src="js" async></script>');
});

test('script renders extended attributes', function () {
    $res = script()
        ->src('/app.js')
        ->defer()
        ->crossorigin(Crossorigin::Anonymous)
        ->integrity('sha256-...')
        ->nomodule()
        ->referrerpolicy(ReferrerPolicy::NoReferrer)
        ->type('module')
        ->fetchpriority('high')
        ->toString();

    expect($res)->toBe(
        '<script src="/app.js" defer crossorigin="anonymous" integrity="sha256-..." nomodule referrerpolicy="no-referrer" type="module" fetchpriority="high"></script>',
    );
});

test('JSON script data round trips without HTML entity escaping or closing-tag injection', function () {
    $data = ['payload' => '</script><script>alert("x")</script>', 'quotes' => "'\"&<>", 'unicode' => 'Grüße'];
    $html = script()->id('data')->nonce('abc')->json($data)->toString();
    expect($html)->toStartWith('<script id="data" nonce="abc" type="application/json">');
    expect(substr_count($html, '</script>'))->toBe(1);
    expect($html)->not->toContain('&quot;');
    $doc = new DOMDocument();
    expect($doc->loadHTML($html))->toBeTrue();
    expect($doc->getElementsByTagName('script')->length)->toBe(1);
    expect(json_decode(
        $doc->getElementsByTagName('script')->item(0)->textContent ?? '',
        true,
        flags: JSON_THROW_ON_ERROR,
    ))
        ->toBe($data);
});

test('JSON script data supports scalars null and JsonSerializable', function () {
    expect(script()->json(null)->toString())->toBe('<script type="application/json">null</script>');
    expect(script()->json(false)->toString())->toBe('<script type="application/json">false</script>');
    expect(script()->json(42)->toString())->toBe('<script type="application/json">42</script>');
    $data = new class implements JsonSerializable {
        public function jsonSerialize(): mixed
        {
            return ['answer' => 42];
        }
    };
    expect(script()->json($data)->toString())->toBe('<script type="application/json">{"answer":42}</script>');
});

test('JSON encoding failures throw without mutating the script', function () {
    $script = script()->id('data');
    expect(fn() => $script->json("\xFF"))->toThrow(JsonException::class);
    expect($script->toString())->toBe('<script id="data"></script>');

    $recursive = new stdClass();
    $recursive->self = $recursive;
    expect(fn() => script()->json($recursive))->toThrow(JsonException::class);
    expect(fn() => script()->json(INF))->toThrow(JsonException::class);
});
