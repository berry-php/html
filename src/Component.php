<?php

declare(strict_types=1);

namespace Berry;

use Override;

abstract class Component implements Element
{
    abstract public function renderComponent(): Element;

    #[Override]
    public function __toString(): string
    {
        return $this->toString();
    }

    #[Override]
    public function toString(): string
    {
        return $this->renderComponent()->toString();
    }
}
