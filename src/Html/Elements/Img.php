<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlVoidTag;

class Img extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('img');
    }

    public function src(string $src): static
    {
        return $this->attr('src', $src);
    }

    public function alt(string $alt): static
    {
        return $this->attr('alt', $alt);
    }
}
