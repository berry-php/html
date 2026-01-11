<?php declare(strict_types=1);

use function Berry\Html5\p;

test('p renders with text', function () {
    expect(p()->text('Para')->toString())->toBe('<p>Para</p>');
});
