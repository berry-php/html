<?php declare(strict_types=1);

use function Berry\Html5\head;
use function Berry\Html5\title;

test('head renders with child', function () {
    expect(head()->child(title())->toString())->toBe('<head><title></title></head>');
});
