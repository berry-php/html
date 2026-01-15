<?php declare(strict_types=1);

use function Berry\Html\li;
use function Berry\Html\ul;

test('ul renders with li', function () {
    expect(ul()->child(li())->toString())->toBe('<ul><li></li></ul>');
});
