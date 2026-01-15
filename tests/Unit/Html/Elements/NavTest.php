<?php declare(strict_types=1);

use function Berry\Html\a;
use function Berry\Html\nav;

test('nav renders with child', function () {
    expect(nav()->child(a())->toString())->toBe('<nav><a></a></nav>');
});
