<?php declare(strict_types=1);

use function Berry\Html5\main;
use function Berry\Html5\p;

test('main renders with child', function () {
    expect(main()->child(p())->toString())->toBe('<main><p></p></main>');
});
