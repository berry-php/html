<?php declare(strict_types=1);

namespace Berry;

/**
 * Render a text node
 */
function text(string $text, bool $raw = false): TextNode
{
    return new TextNode($text, $raw);
}

/**
 * Render multiple elements without a parent node
 */
function fragment(Renderable ...$children): Fragment
{
    return new Fragment()->children($children);
}
