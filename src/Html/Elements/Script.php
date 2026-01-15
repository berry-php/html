<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Traits\HasText;
use Berry\Tag;

class Script extends Tag
{
    use HasText;

    public function __construct()
    {
        parent::__construct('script');
    }

    public function src(string $src): static
    {
        return $this->attr('src', $src);
    }

    public function async(bool $async = true): static
    {
        if (!$async) {
            return $this;
        }

        return $this->flag('async');
    }

    public function defer(bool $defer = true): static
    {
        if (!$defer) {
            return $this;
        }

        return $this->flag('defer');
    }

    public function integrity(string $value): static
    {
        return $this->attr('integrity', $value);
    }

    public function type(string $value): static
    {
        return $this->attr('type', $value);
    }
}
