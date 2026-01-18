<?php declare(strict_types=1);

use function Berry\Html\optgroup;

test('optgroup renders basic', function () {
    expect(optgroup()->toString())->toBe('<optgroup></optgroup>');
});

test('optgroup with label', function () {
    expect(optgroup()->label('Fruits')->toString())->toBe('<optgroup label="Fruits"></optgroup>');
});

test('optgroup with disabled', function () {
    expect(optgroup()->disabled()->toString())->toBe('<optgroup disabled></optgroup>');
});

test('optgroup renders with comfort functions', function () {
    expect(
        optgroup()
            ->label('Group')
            ->option('Option 1')
            ->option('Option 2')
            ->toString()
    )->toBe('<optgroup label="Group"><option>Option 1</option><option>Option 2</option></optgroup>');
});
