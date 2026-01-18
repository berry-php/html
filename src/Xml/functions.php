<?php declare(strict_types=1);

namespace Berry\Xml;

function element(string $name): Element
{
    return new Element($name);
}

function root(string $name): Root
{
    return new Root($name);
}
