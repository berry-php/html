<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * The type of button.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#type
 */
enum ButtonType: string
{
    case Submit = 'submit';
    case Reset = 'reset';
    case Button = 'button';
}
