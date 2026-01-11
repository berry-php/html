<?php declare(strict_types=1);

use function Berry\Html5\img;

test('render simple image tag', function () {
    $res = img()->src('https://example.com/image.png')->toString();
    expect($res)->toBe('<img src="https://example.com/image.png" />');
});
