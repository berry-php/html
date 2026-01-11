<?php declare(strict_types=1);

use function Berry\Html5\header;

test('header renders with text', function () {
    expect(header()->text('Head')->toString())->toBe('<header>Head</header>');
});
