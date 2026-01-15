<?php declare(strict_types=1);

use function Berry\Html\sub;

test('sub renders basic', function () {
    expect(sub()->toString())->toBe('<sub></sub>');
});

test('sub renders with text', function () {
    expect(sub()->text('Subscript')->toString())->toBe('<sub>Subscript</sub>');
});