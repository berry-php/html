<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Preload strategy for audio/video elements.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#preload
 */
enum Preload: string
{
    case None = 'none';
    case Metadata = 'metadata';
    case Auto = 'auto';
}
