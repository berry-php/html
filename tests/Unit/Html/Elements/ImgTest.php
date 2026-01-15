<?php declare(strict_types=1);

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\Decoding;
use Berry\Html\Enums\Loading;
use Berry\Html\Enums\ReferrerPolicy;
use function Berry\Html\img;

test('render simple image tag', function () {
    $res = img()->src('https://example.com/image.png')->toString();
    expect($res)->toBe('<img src="https://example.com/image.png" />');
});

test('img renders new attributes', function () {
    $res = img()
        ->alt('An image')
        ->width(200)
        ->height('100')
        ->srcset('a 1x, b 2x')
        ->sizes('(max-width: 600px) 200px, 50vw')
        ->crossorigin(Crossorigin::Anonymous)
        ->decoding(Decoding::Async)
        ->loading(Loading::Lazy)
        ->referrerpolicy(ReferrerPolicy::NoReferrer)
        ->usemap('#map')
        ->ismap()
        ->toString();

    expect($res)->toBe('<img alt="An image" width="200" height="100" srcset="a 1x, b 2x" sizes="(max-width: 600px) 200px, 50vw" crossorigin="anonymous" decoding="async" loading="lazy" referrerpolicy="no-referrer" usemap="#map" ismap />');
});
