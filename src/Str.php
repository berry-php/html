<?php

declare(strict_types=1);

namespace Berry;

final class Str implements Element
{
    public function __construct(
        private string $content,
    ) {
    }

    public function toString(): string
    {
        return $this->content;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
