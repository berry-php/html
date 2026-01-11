<?php declare(strict_types=1);

use function Berry\Html5\div;

test('render simple card div', function () {
    $res = div()
        ->class('card bg-base-200')
        ->child(null)
        ->child(div()->class('card-body')->text('Hello, World!'))
        ->toString();
    expect($res)->toBe('<div class="card bg-base-200"><div class="card-body">Hello, World!</div></div>');
});
