<?php

declare(strict_types=1);

namespace Berry\Xml;

use Berry\Escaper;

class XmlElement extends XmlTag
{
    public function __construct(string $name)
    {
        parent::__construct(Escaper::xmlName($name));
    }
}
