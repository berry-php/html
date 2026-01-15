<?php declare(strict_types=1);

use function Berry\Html\datalist;

test('datalist renders basic', function () {
    expect(datalist()->toString())->toBe('<datalist></datalist>');
});

test('datalist with id', function () {
    expect(datalist()->id('browsers')->toString())->toBe('<datalist id="browsers"></datalist>');
});