<?php declare(strict_types=1);

use function Berry\Html5\style;

test('style renders with text', function () {
    expect(style()->text('body{}')->toString())->toBe('<style>body{}</style>');
});
