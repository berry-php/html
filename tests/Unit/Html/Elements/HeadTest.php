<?php declare(strict_types=1);

use function Berry\Html\head;
use function Berry\Html\title;

test('head renders with child', function () {
    expect(head()->child(title())->toString())->toBe('<head><title></title></head>');
});
