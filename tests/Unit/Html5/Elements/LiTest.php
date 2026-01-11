<?php declare(strict_types=1);

use function Berry\Html5\li;

test('li renders with text', function () {
    expect(li()->text('Item')->toString())->toBe('<li>Item</li>');
});
