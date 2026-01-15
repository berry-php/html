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