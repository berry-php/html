<?php

declare(strict_types=1);

namespace Berry\Html;

use Berry\Html\Traits\HasGlobalAttributes;
use Berry\VoidTag;

abstract class HtmlVoidTag extends VoidTag
{
    use HasGlobalAttributes;
}
