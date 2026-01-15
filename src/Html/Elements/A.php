<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class A extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('a');
    }

    public function href(string $href): static
    {
        return $this->attr('href', $href);
    }

    public function download(bool $download = true): static
    {
        if (!$download) {
            return $this;
        }

        return $this->flag('download');
    }
}
