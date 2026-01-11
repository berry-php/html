<?php declare(strict_types=1);

use function Berry\Html5\strong;

test('strong renders with text', function () {
    expect(strong()->text('strong')->toString())->toBe('<strong>strong</strong>');
});
