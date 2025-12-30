<?php declare(strict_types=1);

namespace Berry\Html5\Elements;

use Berry\Html5\Traits\HasHref;
use Berry\Html5\Traits\HasSrc;
use Berry\Html5\BaseNode;

class Img extends BaseNode
{
    use HasSrc;
    use HasHref;

    protected static function tagName(): string
    {
        return 'img';
    }

    protected static function isSelfClosing(): bool
    {
        return true;
    }

    public function alt(string $alt): static
    {
        return $this->attr('alt', $alt);
    }
}
