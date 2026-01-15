<?php declare(strict_types=1);

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\ReferrerPolicy;
use Berry\Html\Enums\Rel;

use function Berry\Html\link;

test('link renders href rel', function () {
    expect(link()->href('css')->rel(Rel::Stylesheet)->toString())->toBe('<link href="css" rel="stylesheet" />');
});

test('link renders extended attributes', function () {
    $res = link()
        ->href('/app.css')
        ->rel(Rel::Preload)
        ->as('style')
        ->crossorigin(Crossorigin::Anonymous)
        ->hreflang('en')
        ->imagesizes('100vw')
        ->imagesrcset('/a 1x, /b 2x')
        ->integrity('sha256-...')
        ->media('all')
        ->referrerpolicy(ReferrerPolicy::NoReferrer)
        ->sizes('16x16 32x32')
        ->type('text/css')
        ->fetchpriority('high')
        ->toString();

    expect($res)->toBe('<link href="/app.css" rel="preload" as="style" crossorigin="anonymous" hreflang="en" imagesizes="100vw" imagesrcset="/a 1x, /b 2x" integrity="sha256-..." media="all" referrerpolicy="no-referrer" sizes="16x16 32x32" type="text/css" fetchpriority="high" />');
});
