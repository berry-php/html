<?php

declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasChildrenContract;
use Berry\Traits\HasChildren;
use Override;

final class Fragment implements Element, HasChildrenContract
{
    use HasChildren;

    #[Override]
    public function toString(): string
    {
        return $this->body;
    }

    #[Override]
    public function __toString(): string
    {
        return $this->toString();
    }
}
