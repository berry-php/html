<?php declare(strict_types=1);

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

    expect($res)->toBe('<script src="/app.js" defer crossorigin="anonymous" integrity="sha256-..." nomodule referrerpolicy="no-referrer" type="module" fetchpriority="high"></script>');
});
