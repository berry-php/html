<?php declare(strict_types=1);

use function Berry\Html\b;
use function Berry\Html\div;
use function Berry\Html\main;

test('rendering escaped text', function () {
    expect(div()->text('<b>This should be escaped</b>')->toString())->toBe('<div>&lt;b&gt;This should be escaped&lt;/b&gt;</div>');
});

test('rendering unescaped text', function () {
    expect(div()->unsafeRaw('<b>This should not be escaped</b>')->toString())->toBe('<div><b>This should not be escaped</b></div>');
});

test('render text via function', function () {
    expect(
        div()->child(b()->text(fn() => 'Hello, World'))->toString()
    )->toBe('<div><b>Hello, World</b></div>');
});

test('render multiple text nodes in succession', function () {
    expect(
        b()
            ->text('Hello')
            ->text(null)
            ->text(' ')
            ->text('World')
            ->toString()
    )->toBe('<b>Hello World</b>');
});

test('it prevents escaping bypasses in text nodes', function () {
    $payload = '</div><script>alert(1)</script> <b onmouseover="alert(1)">';

    $html = main()->text($payload)->toString();

    expect($html)->not->toContain('</div>');
    expect($html)->not->toContain('<script>');

    expect($html)->toBe('<main>&lt;/div&gt;&lt;script&gt;alert(1)&lt;/script&gt; &lt;b onmouseover=&quot;alert(1)&quot;&gt;</main>');
});

test('unsafeRaw does not accidentally sanitize', function () {
    $complexHtml = '<div class="foo" data-json=\'{"a":1}\'>Bar</div>';
    expect(div()->unsafeRaw($complexHtml)->toString())
        ->toBe("<div>$complexHtml</div>");
});

test('it handles closures returning non-string values', function () {
    expect(div()->text(fn() => 123)->toString())->toBe('<div>123</div>');
    expect(div()->text(fn() => null)->toString())->toBe('<div></div>');
});

test('it handles closures that return malicious HTML', function () {
    $malicious = fn() => '<script>alert(1)</script>';
    expect(div()->text($malicious)->toString())
        ->toBe('<div>&lt;script&gt;alert(1)&lt;/script&gt;</div>');
});

test('it strips null bytes from text nodes', function () {
    $payload = "Hello\0World";
    $html = div()->text($payload)->toString();

    expect($html)->not->toContain("\0");
    expect($html)->toBe('<div>HelloWorld</div>');
});

test('it handles large text nodes without crashing', function () {
    $largeString = str_repeat('Safe Content ', 10000);
    $html = div()->text($largeString)->toString();

    expect($html)->toContain($largeString);
});
