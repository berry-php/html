<?php declare(strict_types=1);

use function Berry\Html\datalist;

test('datalist renders basic', function () {
    expect(datalist()->toString())->toBe('<datalist></datalist>');
});

test('datalist with id', function () {
    expect(datalist()->id('browsers')->toString())->toBe('<datalist id="browsers"></datalist>');
});

test('datalist renders with comfort functions', function () {
    expect(
        datalist()
            ->option(null, 'Option 1')
            ->option('val2', 'Option 2')
            ->toString()
    )->toBe('<datalist><option>Option 1</option><option value="val2">Option 2</option></datalist>');
});
