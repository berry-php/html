<?php declare(strict_types=1);

use function Berry\Html5\div;

test('test if inspector can render', function () {
    $elem = div()->text('Hello, World!');
    $res1 = $elem->toString();
    $res2 = $elem->dump(true)->toString();

    expect(strlen($res2))->toBeGreaterThan(strlen($res1));
});
