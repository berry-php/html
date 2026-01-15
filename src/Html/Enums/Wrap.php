<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Text wrapping behavior for textarea elements.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#wrap
 */
enum Wrap: string
{
    case Soft = 'soft';
    case Hard = 'hard';
}
