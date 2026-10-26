<?php

declare(strict_types=1);

namespace Berry\Html;

use Berry\Contract\HasChildrenContract;
use Berry\Contract\HasTextContract;
use Berry\Html\Traits\HasGlobalAttributes;
use Berry\Traits\HasChildren;
use Berry\Traits\HasText;
use Berry\Tag;

abstract class HtmlTag extends Tag implements HasChildrenContract, HasTextContract
{
    use HasGlobalAttributes;
    use HasChildren;
    use HasText;
}
