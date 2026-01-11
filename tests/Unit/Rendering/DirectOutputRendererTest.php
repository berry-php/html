<?php declare(strict_types=1);

use Berry\Rendering\DirectOutputRenderer;

use function Berry\Html5\h1;

test('test direct output renderer', function () {
    $content = h1()->text('Hello, World!');

    ob_start();
    $content->render(new DirectOutputRenderer());
    $out = ob_get_clean();

    expect($out)->toBe('<h1>Hello, World!</h1>');
});
