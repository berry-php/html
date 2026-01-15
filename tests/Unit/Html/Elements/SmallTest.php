<?php declare(strict_types=1);

use function Berry\Html\small;

test('small renders with text', function () {
    expect(small()->text('small')->toString())->toBe('<small>small</small>');
});
