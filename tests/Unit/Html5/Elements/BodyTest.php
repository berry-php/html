<?php declare(strict_types=1);

use function Berry\Html5\body;
use function Berry\Html5\div;

test('body renders with child', function () {
    expect(body()->child(div())->toString())->toBe('<body><div></div></body>');
});
