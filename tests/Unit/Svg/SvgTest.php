<?php declare(strict_types=1);

use function Berry\Svg\circle;
use function Berry\Svg\defs;
use function Berry\Svg\g;
use function Berry\Svg\line;
use function Berry\Svg\path;
use function Berry\Svg\rect;
use function Berry\Svg\svg;
use function Berry\Svg\text;

test('svg element renders with default xmlns', function () {
    expect(svg()->toString())->toBe('<svg xmlns="http://www.w3.org/2000/svg"></svg>');
});

test('svg standalone mode renders declaration and doctype', function () {
    expect(svg()->standalone()->toString())
        ->toBe('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg"></svg>');
});

test('g element renders correctly', function () {
    expect(g()->toString())->toBe('<g></g>');
});

test('path element renders correctly', function () {
    expect(path()->d('M 10 10')->toString())->toBe('<path d="M 10 10"></path>');
});

test('circle element renders correctly', function () {
    expect(circle()->cx(50)->cy(50)->r(40)->toString())->toBe('<circle cx="50" cy="50" r="40"></circle>');
});

test('rect element renders correctly', function () {
    expect(rect()->x(10)->y(10)->width(100)->height(100)->toString())->toBe('<rect x="10" y="10" width="100" height="100"></rect>');
});

test('line element renders correctly', function () {
    expect(line()->x1(0)->y1(0)->x2(100)->y2(100)->toString())->toBe('<line x1="0" y1="0" x2="100" y2="100"></line>');
});

test('text element renders correctly', function () {
    expect(text()->x(10)->y(10)->text('Hello')->toString())->toBe('<text x="10" y="10">Hello</text>');
});

test('defs element renders correctly', function () {
    expect(defs()->toString())->toBe('<defs></defs>');
});

test('svg elements inherit global attributes', function () {
    expect(circle()->id('my-circle')->class('red')->toString())->toBe('<circle id="my-circle" class="red"></circle>');
});
