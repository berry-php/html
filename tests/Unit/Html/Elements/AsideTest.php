<?php declare(strict_types=1);

use function Berry\Html\aside;

test('aside renders with text', function () {
    expect(aside()->text('Sidebar')->toString())->toBe('<aside>Sidebar</aside>');
});
