<?php declare(strict_types=1);

use function Berry\Html\fieldset;
use function Berry\Html\legend;

test('fieldset renders basic', function () {
    expect(fieldset()->toString())->toBe('<fieldset></fieldset>');
});

test('fieldset with disabled', function () {
    expect(fieldset()->disabled()->toString())->toBe('<fieldset disabled></fieldset>');
});

test('fieldset with attributes', function () {
    expect(fieldset()->form('form1')->name('group1')->toString())->toBe('<fieldset form="form1" name="group1"></fieldset>');
});

test('legend renders basic', function () {
    expect(legend()->toString())->toBe('<legend></legend>');
});