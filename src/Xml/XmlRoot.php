<?php

declare(strict_types=1);

namespace Berry\Xml;

use Override;

class XmlRoot extends XmlElement
{
    #[Override]
    public function toString(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?>' . parent::toString();
    }
}
