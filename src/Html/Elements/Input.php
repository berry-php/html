<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\InputType;
use Berry\Html\HtmlVoidTag;

class Input extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    protected static function isSelfClosing(): bool
    {
        return true;
    }

    public function type(InputType|string $type): static
    {
        if (is_string($type)) {
            $type = InputType::from($type);
        }

        return $this->attr('type', $type->value);
    }

    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    public function value(string $value): static
    {
        return $this->attr('value', $value);
    }

    public function checked(bool $checked = true): static
    {
        if (!$checked) {
            return $this;
        }

        return $this->flag('checked');
    }

    public function accept(string $value): static
    {
        return $this->attr('accept', $value);
    }

    public function capture(bool $capture = true): static
    {
        if (!$capture) {
            return $this;
        }

        return $this->flag('capture');
    }

    public function autocomplete(bool $value): static
    {
        return $this->attr('autocomplete', $value ? 'on' : 'off');
    }

    public function placeholder(string $placeholder): static
    {
        return $this->attr('placeholder', $placeholder);
    }
}
