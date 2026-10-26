<?php

declare(strict_types=1);

namespace Berry;

class VoidTag extends AbstractTag
{
    public function toString(): string
    {
        if ($this->attributes === null) {
            return "<{$this->tagName} />";
        }

        return "<{$this->tagName}" . $this->renderAttributeList() . ' />';
    }
}
