<?php

declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasChildrenContract;
use Berry\Traits\HasChildren;
use Override;

class Tag extends AbstractTag implements HasChildrenContract
{
    use HasChildren;

    #[Override]
    public function toString(): string
    {
        if ($this->attributes === null) {
            return "<{$this->tagName}>{$this->body}</{$this->tagName}>";
        }

        return "<{$this->tagName}" . $this->renderAttributeList() . ">{$this->body}</{$this->tagName}>";
    }
}
