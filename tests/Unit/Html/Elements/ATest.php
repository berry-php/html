<?php declare(strict_types=1);

use function Berry\Html\a;

test('a renders basic', function () {
    expect(a()->toString())->toBe('<a></a>');
});

test('a with href and text', function () {
    expect(a()->href('/link')->text('Click')->toString())->toBe('<a href="/link">Click</a>');
});

test('a with download', function () {
    expect(a()->download()->toString())->toBe('<a download></a>');
});
