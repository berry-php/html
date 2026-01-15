<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\VoidTag;

class Meta extends VoidTag
{
    public function __construct()
    {
        parent::__construct('meta');
    }

    public function charset(string $value): static
    {
        return $this->attr('charset', $value);
    }

    public function content(string $value): static
    {
        return $this->attr('content', $value);
    }

    public function httpEquiv(string $value): static
    {
        return $this->attr('http-equiv', $value);
    }

    public function media(string $value): static
    {
        return $this->attr('media', $value);
    }

    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }
}
