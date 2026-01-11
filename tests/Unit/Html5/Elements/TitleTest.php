<?php declare(strict_types=1);

use function Berry\Html5\title;

test('title renders correctly', function () {
    expect(title()->text('Page Title')->toString())->toBe('<title>Page Title</title>');
});
