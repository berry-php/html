<?php declare(strict_types=1);

use function Berry\Html5\a;
use function Berry\Html5\nav;

test('nav renders with child', function () {
    expect(nav()->child(a())->toString())->toBe('<nav><a></a></nav>');
});
