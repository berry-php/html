<?php

declare(strict_types=1);

namespace Berry\Xml;

use Berry\Contract\HasChildrenContract;
use Berry\Contract\HasTextContract;
use Berry\Traits\HasChildren;
use Berry\Traits\HasText;
use Berry\Tag;
use Berry\Xml\Traits\HasXmlAttributes;
use Berry\Xml\Traits\HasXmlText;

abstract class XmlTag extends Tag implements HasChildrenContract, HasTextContract
{
    use HasChildren;
    use HasXmlAttributes;
    use HasText, HasXmlText {
        HasXmlText::text insteadof HasText;
    }
}
