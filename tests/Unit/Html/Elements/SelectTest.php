<?php declare(strict_types=1);

use function Berry\Html\select;

test('select renders name multiple', function () {
    expect(select()->name('choice')->multiple()->toString())->toBe('<select name="choice" multiple></select>');
});

test('select renders extended attributes', function () {
    $res = select()
        ->name('s')
        ->disabled()
        ->form('f')
        ->required()
        ->size(5)
        ->autocomplete('shipping')
        ->toString();

    expect($res)->toBe('<select name="s" disabled form="f" required size="5" autocomplete="shipping"></select>');
});
