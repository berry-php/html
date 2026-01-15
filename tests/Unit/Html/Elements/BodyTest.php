<?php declare(strict_types=1);

use function Berry\Html\body;
use function Berry\Html\div;

test('body renders with child', function () {
    expect(body()->child(div())->toString())->toBe('<body><div></div></body>');
});
