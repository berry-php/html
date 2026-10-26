<?php

declare(strict_types=1);

use function Berry\Html\select;
use function Berry\Html\optgroup;

use Berry\Html\Elements\Option;

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
            ->optgroup(fn($optgroup) => $optgroup->label('Group 1')->option('Option 2'))
            ->toString(),
    )
        ->toBe(
            '<select><option>Option 1</option><optgroup label="Group 1"><option>Option 2</option></optgroup></select>',
        );
});

test('select options support configuration callbacks and legacy label callbacks', function () {
    $html = select()
        ->option(fn(Option $option) => $option->value('a&b')->label('Shown')->selected()->disabled()->text('A & B'))
        ->option(fn() => 'Legacy label')
        ->option()
        ->toString();

    expect($html)->toBe(
        '<select><option value="a&amp;b" label="Shown" selected disabled>A &amp; B</option><option>Legacy label</option><option></option></select>',
    );
});

test('option configuration callbacks need not return the option', function () {
    expect(
        select()->option(function (Option $option): void {
            $option->value('42')->text('Answer');
        })->toString(),
    )
        ->toBe('<select><option value="42">Answer</option></select>');
});

test('optgroup uses the same configurable option API', function () {
    expect(
        optgroup()
            ->label('Group')
            ->option(fn(Option $option) => $option->value('x')->selected()->text('X'))
            ->option(fn() => 'Legacy')
            ->toString(),
    )
        ->toBe('<optgroup label="Group"><option value="x" selected>X</option><option>Legacy</option></optgroup>');
});
