<?php declare(strict_types=1);

use function Berry\Html\b;

test('b renders with text', function () {
    expect(b()->text('bold')->toString())->toBe('<b>bold</b>');
});
