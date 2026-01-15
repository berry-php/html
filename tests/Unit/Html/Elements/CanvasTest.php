<?php declare(strict_types=1);

use function Berry\Html\canvas;

test('canvas renders basic', function () {
    expect(canvas()->toString())->toBe('<canvas></canvas>');
});

test('canvas with size', function () {
    expect(canvas()->width(100)->height(50)->toString())->toBe('<canvas width="100" height="50"></canvas>');
});