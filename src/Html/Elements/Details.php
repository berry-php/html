<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class Details extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('details');
    }

    public function open(bool $open = true): static
    {
        if (!$open) {
            return $this;
        }

        return $this->flag('open');
    }
}
