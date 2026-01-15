<?php declare(strict_types=1);

use function Berry\Html\li;
use function Berry\Html\ol;

test('ol renders with li', function () {
    expect(ol()->child(li())->toString())->toBe('<ol><li></li></ol>');
});

test('ol renders extended attributes', function () {
    $res = ol()->reversed()->start(3)->type('A')->toString();
    expect($res)->toBe('<ol reversed start="3" type="A"></ol>');
});
