<?php declare(strict_types=1);

namespace Berry\Html\Enums;

use Stringable;

enum Target: string
{
    case Self = '_self';
    case Blank = '_blank';
    case Parent = '_parent';
    case Top = '_top';
}
