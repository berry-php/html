<?php declare(strict_types=1);

namespace Berry\Svg;

use Berry\Svg\Elements\Circle;
use Berry\Svg\Elements\Defs;
use Berry\Svg\Elements\G;
use Berry\Svg\Elements\Line;
use Berry\Svg\Elements\Path;
use Berry\Svg\Elements\Rect;
use Berry\Svg\Elements\Svg;
use Berry\Svg\Elements\Text;

function svg(): Svg
{
    return new Svg();
}

function g(): G
{
    return new G();
}

function path(): Path
{
    return new Path();
}

function circle(): Circle
{
    return new Circle();
}

function rect(): Rect
{
    return new Rect();
}

function line(): Line
{
    return new Line();
}

function text(): Text
{
    return new Text();
}

function defs(): Defs
{
    return new Defs();
}
