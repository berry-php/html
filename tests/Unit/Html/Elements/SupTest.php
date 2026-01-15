<?php declare(strict_types=1);

use function Berry\Html\sup;

test('sup renders basic', function () {
    expect(sup()->toString())->toBe('<sup></sup>');
});

test('sup renders with text', function () {
    expect(sup()->text('Superscript')->toString())->toBe('<sup>Superscript</sup>');
});