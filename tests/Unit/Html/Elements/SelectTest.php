<?php declare(strict_types=1);

use function Berry\Html\select;
use function Berry\Html\optgroup;

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

test('select renders with comfort functions', function () {
    expect(
        select()
            ->option('Option 1')
            ->optgroup(function ($optgroup) {
                return $optgroup->label('Group 1')->option('Option 2');
            })
            ->toString()
    )->toBe('<select><option>Option 1</option><optgroup label="Group 1"><option>Option 2</option></optgroup></select>');
});
