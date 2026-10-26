<?php

declare(strict_types=1);

namespace Berry\Xml;

class XmlRoot extends XmlElement
{
    public function toString(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?>' . parent::toString();
    }
}
