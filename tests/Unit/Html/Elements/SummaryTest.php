<?php declare(strict_types=1);

use function Berry\Html\summary;

test('summary renders with text', function () {
    expect(summary()->text('Sum')->toString())->toBe('<summary>Sum</summary>');
});
