<?php declare(strict_types=1);

use Berry\Html\Enums\FormMethod;
use Berry\Html\Enums\Rel;
use Berry\Html\Enums\Target;

use function Berry\Html\form;

test('form renders with action method', function () {
    expect(form()->action('/')->method(FormMethod::Post)->toString())->toBe('<form action="/" method="POST"></form>');
});

test('form renders with more attributes', function () {
    $res = form()
        ->name('f')
        ->enctype('multipart/form-data')
        ->novalidate()
        ->target(Target::Blank)
        ->autocomplete(true)
        ->acceptCharset('utf-8')
        ->rel(Rel::NoOpener)
        ->toString();

    expect($res)->toBe('<form name="f" enctype="multipart/form-data" novalidate target="_blank" autocomplete="on" accept-charset="utf-8" rel="noopener"></form>');
});
