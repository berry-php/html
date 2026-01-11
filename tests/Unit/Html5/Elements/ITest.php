<?php declare(strict_types=1);

use function Berry\Html5\i;

test('i renders with text', function () {
    expect(i()->text('italic')->toString())->toBe('<i>italic</i>');
});
