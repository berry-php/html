<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Input mode hint for virtual keyboards.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/inputmode
 */
enum InputMode: string
{
    case None = 'none';
    case Text = 'text';
    case Tel = 'tel';
    case Url = 'url';
    case Email = 'email';
    case Numeric = 'numeric';
    case Decimal = 'decimal';
    case Search = 'search';
}
