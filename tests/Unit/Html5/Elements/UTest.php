<?php declare(strict_types=1);

use function Berry\Html5\u;

test('u renders with text', function () {
    expect(u()->text('underline')->toString())->toBe('<u>underline</u>');
});
