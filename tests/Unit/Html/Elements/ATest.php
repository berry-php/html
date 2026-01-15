<?php declare(strict_types=1);

use Berry\Html\Enums\ReferrerPolicy;
use Berry\Html\Enums\Rel;
use Berry\Html\Enums\Target;
use function Berry\Html\a;

test('a renders basic', function () {
    expect(a()->toString())->toBe('<a></a>');
});

test('a with href and text', function () {
    expect(a()->href('/link')->text('Click')->toString())->toBe('<a href="/link">Click</a>');
});

test('a with download', function () {
    expect(a()->download()->toString())->toBe('<a download></a>');
    expect(a()->download('file.txt')->toString())->toBe('<a download="file.txt"></a>');
});

test('a with new attributes', function () {
    $res = a()
        ->rel(Rel::NoFollow)
        ->target(Target::Blank)
        ->hreflang('en')
        ->ping('https://tracking.com')
        ->type('text/html')
        ->referrerpolicy(ReferrerPolicy::NoReferrer)
        ->toString();

    expect($res)->toBe('<a rel="nofollow" target="_blank" hreflang="en" ping="https://tracking.com" type="text/html" referrerpolicy="no-referrer"></a>');
});
