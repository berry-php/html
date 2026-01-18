<?php declare(strict_types=1);

namespace Berry\Xml;

use Berry\Contract\HasChildrenContract;
use Berry\Contract\HasInspectorContract;
use Berry\Contract\HasTextContract;
use Berry\Tag;
use Berry\Traits\HasChildren;
use Berry\Traits\HasInspector;
use Berry\Traits\HasText;

abstract class XmlTag extends Tag implements HasChildrenContract, HasTextContract, HasInspectorContract
{
    use HasChildren;
    use HasText;
    use HasInspector;
}
