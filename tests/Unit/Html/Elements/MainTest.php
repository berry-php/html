<?php declare(strict_types=1);

use function Berry\Html\main;
use function Berry\Html\p;

test('main renders with child', function () {
    expect(main()->child(p())->toString())->toBe('<main><p></p></main>');
});
