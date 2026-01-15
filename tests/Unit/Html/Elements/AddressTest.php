<?php declare(strict_types=1);

use function Berry\Html\address;

test('address renders basic', function () {
    expect(address()->toString())->toBe('<address></address>');
});

test('address renders with text', function () {
    expect(address()->text('123 Main St')->toString())->toBe('<address>123 Main St</address>');
});