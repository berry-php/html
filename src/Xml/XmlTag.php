<?php declare(strict_types=1);

namespace Berry\Xml;

use Berry\Contract\HasChildrenContract;
use Berry\Contract\HasTextContract;
use Berry\Traits\HasChildren;
use Berry\Traits\HasText;
use Berry\Tag;

abstract class XmlTag extends Tag implements HasChildrenContract, HasTextContract
{
    use HasChildren;
    use HasText;
}
