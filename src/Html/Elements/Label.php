<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class Label extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('label');
    }

    public function for(string $value): static
    {
        return $this->attr('for', $value);
    }
}
