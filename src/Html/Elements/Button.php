<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class Button extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('button');
    }

    public function type(string $value): static
    {
        return $this->attr('type', $value);
    }

    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    public function value(string $value): static
    {
        return $this->attr('value', $value);
    }

    public function disabled(bool $disabled = true): static
    {
        if (!$disabled) {
            return $this;
        }

        return $this->flag('disabled');
    }
}
