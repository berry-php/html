<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Text direction of the element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
 */
enum Direction: string
{
    case Ltr = 'ltr';
    case Rtl = 'rtl';
    case Auto = 'auto';
}
