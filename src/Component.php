<?php

declare(strict_types=1);

namespace Berry;

abstract class Component implements Element
{
    abstract public function renderComponent(): Element;

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->renderComponent()->toString();
    }
}
