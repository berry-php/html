<?php declare(strict_types=1);

namespace Berry\Html5;

use Berry\Html5\Traits\HasGlobalAttributes;
use Berry\Traits\HasInspector;
use Berry\Node;

abstract class BaseNode extends Node
{
    use HasGlobalAttributes;
    use HasInspector;
}
