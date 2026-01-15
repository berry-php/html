<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Loading strategy for the element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#loading
 */
enum Loading: string
{
    case Eager = 'eager';
    case Lazy = 'lazy';
}
