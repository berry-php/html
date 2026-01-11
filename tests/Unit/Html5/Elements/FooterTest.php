<?php declare(strict_types=1);

use function Berry\Html5\footer;

test('footer renders with text', function () {
    expect(footer()->text('©')->toString())->toBe('<footer>©</footer>');
});
