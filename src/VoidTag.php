<?php

declare(strict_types=1);

namespace Berry;

use Override;

class VoidTag extends AbstractTag
{
    #[Override]
    public function toString(): string
    {
        if ($this->attributes === null) {
            return "<{$this->tagName} />";
        }

        return "<{$this->tagName}" . $this->renderAttributeList() . ' />';
    }
}
