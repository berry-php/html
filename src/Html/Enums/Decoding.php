<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Decoding hint for images.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#decoding
 */
enum Decoding: string
{
    case Sync = 'sync';
    case Async = 'async';
    case Auto = 'auto';
}
