<?php declare(strict_types=1);

namespace Berry\Html\Enums;

/**
 * Referrer policy for the element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/referrerpolicy
 */
enum ReferrerPolicy: string
{
    case NoReferrer = 'no-referrer';
    case NoReferrerWhenDowngrade = 'no-referrer-when-downgrade';
    case Origin = 'origin';
    case OriginWhenCrossOrigin = 'origin-when-cross-origin';
    case SameOrigin = 'same-origin';
    case StrictOrigin = 'strict-origin';
    case StrictOriginWhenCrossOrigin = 'strict-origin-when-cross-origin';
    case UnsafeUrl = 'unsafe-url';
}
