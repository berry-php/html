<?php declare(strict_types=1);

use function Berry\Html5\li;
use function Berry\Html5\ul;

test('ul renders with li', function () {
    expect(ul()->child(li())->toString())->toBe('<ul><li></li></ul>');
});
