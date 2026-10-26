<?php

declare(strict_types=1);

namespace Berry\Xml;

function xmlElement(string $name): XmlElement
{
    return new XmlElement($name);
}

function xmlRoot(string $name): XmlRoot
{
    return new XmlRoot($name);
}
