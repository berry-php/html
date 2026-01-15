<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\FormMethod;
use Berry\Html\HtmlTag;

class Form extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('form');
    }

    public function action(string $value): static
    {
        return $this->attr('action', $value);
    }

    public function method(FormMethod|string $method): static
    {
        if (is_string($method)) {
            $method = FormMethod::from($method);
        }

        return $this->attr('method', $method->value);
    }

    public function acceptCharset(string $value): static
    {
        return $this->attr('accept-charset', $value);
    }

    public function autocomplete(bool $value): static
    {
        return $this->attr('autocomplete', $value ? 'on' : 'off');
    }
}
