<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Rel;
use Berry\Html\HtmlVoidTag;

class Link extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('link');
    }

    public function href(string $href): static
    {
        return $this->attr('href', $href);
    }

    public function rel(Rel|string $rel): static
    {
        if (is_string($rel)) {
            $rel = Rel::from($rel);
        }

        return $this->attr('rel', $rel->value);
    }

    public function integrity(string $value): static
    {
        return $this->attr('integrity', $value);
    }
}
