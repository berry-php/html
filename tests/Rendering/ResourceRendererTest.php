<?php declare(strict_types=1);

use Berry\Rendering\ResourceRenderer;

use function Berry\Html5\div;

test('test resource renderer', function () {
    $renderer = ResourceRenderer::temp();

    $elem = div()->id('to-be-rendered')->text('Hello, World!');

    expect($elem->toString($renderer))->toBe('<div id="to-be-rendered">Hello, World!</div>');

    $elem2 = div()->text("I'm different");

    expect($elem2->toString($renderer))->toBe('<div id="to-be-rendered">Hello, World!</div><div>I&#039;m different</div>');
});
