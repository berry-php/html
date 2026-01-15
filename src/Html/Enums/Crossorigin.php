<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * CORS settings for the element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/crossorigin
 */
enum Crossorigin: string
{
    case Anonymous = 'anonymous';
    case UseCredentials = 'use-credentials';
}
