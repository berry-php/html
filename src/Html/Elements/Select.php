<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class Select extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('select');
    }

    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    public function disabled(bool $disabled = true): static
    {
        if (!$disabled) {
            return $this;
        }

        return $this->flag('disabled');
    }

    public function multiple(bool $multiple = true): static
    {
        if (!$multiple) {
            return $this;
        }

        return $this->flag('multiple');
    }

    public function autocomplete(bool $value): static
    {
        return $this->attr('autocomplete', $value ? 'on' : 'off');
    }
}
