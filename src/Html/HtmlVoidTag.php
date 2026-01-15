<?php declare(strict_types=1);

namespace Berry\Html;

use Berry\Contract\HasInspectorContract;
use Berry\Html\Traits\HasGlobalAttributes;
use Berry\Traits\HasInspector;
use Berry\VoidTag;

abstract class HtmlVoidTag extends VoidTag implements HasInspectorContract
{
    use HasGlobalAttributes;
    use HasInspector;
}
