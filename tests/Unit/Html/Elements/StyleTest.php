<?php declare(strict_types=1);

use function Berry\Html\style;

test('style renders with text', function () {
    expect(style()->text('body{}')->toString())->toBe('<style>body{}</style>');
});

test('style renders with media', function () {
    expect(style()->media('screen')->text('body{color:black}')->toString())->toBe('<style media="screen">body{color:black}</style>');
});