<?php declare(strict_types=1);

namespace Berry\Xml;

class Element extends XmlTag
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        parent::__construct($name);
    }

    protected function tagName(): string
    {
        return $this->name;
    }
}
