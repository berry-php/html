<?php declare(strict_types=1);

use function Berry\Html\u;

test('u renders with text', function () {
    expect(u()->text('underline')->toString())->toBe('<u>underline</u>');
});
