<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class TextArea extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('textarea');
    }

    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    public function rows(int $value): static
    {
        return $this->attr('rows', (string) $value);
    }

    public function cols(int $value): static
    {
        return $this->attr('cols', (string) $value);
    }

    public function disabled(bool $disabled = true): static
    {
        if (!$disabled) {
            return $this;
        }

        return $this->flag('disabled');
    }

    public function autocomplete(bool $value): static
    {
        return $this->attr('autocomplete', $value ? 'on' : 'off');
    }
}
