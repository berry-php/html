<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Contract\HasTextContract;
use Berry\Traits\HasText;
use Berry\Tag;

class Option extends Tag implements HasTextContract
{
    use HasText;

    public function __construct()
    {
        parent::__construct('option');
    }

    public function value(string $value): static
    {
        return $this->attr('value', $value);
    }

    public function selected(bool $selected = true): static
    {
        if (!$selected) {
            return $this;
        }

        return $this->flag('selected');
    }

    public function disabled(bool $disabled = true): static
    {
        if (!$disabled) {
            return $this;
        }

        return $this->flag('disabled');
    }
}
