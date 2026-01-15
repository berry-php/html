<?php declare(strict_types=1);

namespace Berry;

use Berry\Rendering\Escaper;

/**
 * Render a text node
 */
function text(string $text): Element
{
    return new Str(Escaper::escape($text));
}

/**
 * Render a text node without escaping
 */
function unsafeRawText(string $raw): Element
{
    return new Str($raw);
}

/**
 * Render multiple elements without a parent node
 */
function fragment(Element ...$children): Fragment
{
    return (new Fragment())->children($children);
}
