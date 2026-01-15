<?php declare(strict_types=1);

use Berry\Html\Enums\FormMethod;
use Berry\Html\Enums\InputType;
use Berry\Html\Enums\Target;

use function Berry\Html\input;

test('input renders type name', function () {
    expect(input()->type(InputType::Text)->name('user')->toString())->toBe('<input type="text" name="user" />');
});

test('input renders checked', function () {
    expect(input()->type(InputType::Checkbox)->checked()->toString())->toBe('<input type="checkbox" checked />');
});

test('input renders extended attributes', function () {
    $res = input()
        ->type(InputType::Number)
        ->min(1)
        ->max(10)
        ->step(2)
        ->pattern('[0-9]+')
        ->required()
        ->readonly()
        ->multiple()
        ->maxlength(5)
        ->minlength(1)
        ->size(3)
        ->list('numbers')
        ->placeholder('enter')
        ->autocomplete(true)
        ->toString();

    expect($res)->toBe('<input type="number" min="1" max="10" step="2" pattern="[0-9]+" required readonly multiple maxlength="5" minlength="1" size="3" list="numbers" placeholder="enter" autocomplete="on" />');
});

test('input renders form attributes', function () {
    $res = input()
        ->type(InputType::Submit)
        ->form('f')
        ->formaction('/x')
        ->formenctype('multipart/form-data')
        ->formmethod(FormMethod::Post)
        ->formnovalidate()
        ->formtarget(Target::Blank)
        ->toString();

    expect($res)->toBe('<input type="submit" form="f" formaction="/x" formenctype="multipart/form-data" formmethod="POST" formnovalidate formtarget="_blank" />');
});
