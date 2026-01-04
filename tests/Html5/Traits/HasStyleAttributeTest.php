<?php declare(strict_types=1);

use function Berry\Html5\div;

test('test style with array', function () {
    expect(div()->style(['color' => 'red', 'margin' => '10px'])->toString())
        ->toBe('<div style="color: red; margin: 10px"></div>');
});

test('test adding styles with multiple calls', function () {
    expect(div()->style(['color' => 'red'])->style(['display' => 'block'])->toString())
        ->toBe('<div style="color: red; display: block"></div>');
});

test('test style values are overwritten by subsequent calls', function () {
    expect(div()->style(['color' => 'red'])->style(['color' => 'blue'])->toString())
        ->toBe('<div style="color: blue"></div>');
});

test('test styles and classes together', function () {
    expect(div()->class('container')->style(['padding' => '20px'])->toString())
        ->toBe('<div class="container" style="padding: 20px"></div>');
});

test('test style with empty array does not render style attribute', function () {
    expect(div()->style([])->toString())->toBe('<div></div>');
});

test('test complex style formatting', function () {
    $styles = [
        'background-color' => '#fff',
        'border' => '1px solid black',
        'z-index' => '999'
    ];

    expect(div()->style($styles)->toString())
        ->toBe('<div style="background-color: #fff; border: 1px solid black; z-index: 999"></div>');
});
