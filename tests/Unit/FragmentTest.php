<?php declare(strict_types=1);

use function Berry\Html\h1;
use function Berry\Html\h2;
use function Berry\Html\h3;
use function Berry\fragment;

test('test fragments', function () {
    $res = fragment(
        h1()->text('#1'),
        h2()->text('#2'),
        h3()->text('#3'),
    )->toString();

    expect($res)->toBe('<h1>#1</h1><h2>#2</h2><h3>#3</h3>');
});
