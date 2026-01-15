<?php declare(strict_types=1);

use function Berry\Html\code;

test('code renders with text', function () {
    expect(code()->text('var x;')->toString())->toBe('<code>var x;</code>');
});
