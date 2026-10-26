<?php

declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasChildrenContract;
use Berry\Traits\HasChildren;

final class Fragment implements Element, HasChildrenContract
{
    use HasChildren;

    public function toString(): string
    {
        return $this->body;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
