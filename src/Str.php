<?php

declare(strict_types=1);

namespace Berry;

use Override;

final class Str implements Element
{
    public function __construct(
        private string $content,
    ) {
    }

    #[Override]
    public function toString(): string
    {
        return $this->content;
    }

    #[Override]
    public function __toString(): string
    {
        return $this->toString();
    }
}
