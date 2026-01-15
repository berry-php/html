<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Auto-capitalization behavior for user input.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/autocapitalize
 */
enum AutoCapitalize: string
{
    case Off = 'off';
    case None = 'none';
    case On = 'on';
    case Sentences = 'sentences';
    case Words = 'words';
    case Characters = 'characters';
}
