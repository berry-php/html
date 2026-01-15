<?php declare(strict_types=1);

use function Berry\Html\span;

test('span renders with text', function () {
    expect(span()->text('span')->toString())->toBe('<span>span</span>');
});
