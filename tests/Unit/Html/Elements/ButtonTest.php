<?php declare(strict_types=1);

use Berry\Html\Enums\ButtonType;
use Berry\Html\Enums\FormMethod;
use Berry\Html\Enums\Target;
use function Berry\Html\button;

test('button renders with attrs', function () {
    expect(button()->text('Click')->type('submit')->disabled()->toString())->toBe('<button type="submit" disabled>Click</button>');
});

test('button with enum type renders', function () {
    expect(button()->type(ButtonType::Reset)->toString())->toBe('<button type="reset"></button>');
});

test('button with form attributes', function () {
    $res = button()
        ->form('my-form')
        ->formaction('/submit')
        ->formenctype('multipart/form-data')
        ->formmethod(FormMethod::Post)
        ->formnovalidate()
        ->formtarget(Target::Blank)
        ->toString();

    expect($res)->toBe('<button form="my-form" formaction="/submit" formenctype="multipart/form-data" formmethod="POST" formnovalidate formtarget="_blank"></button>');
});
