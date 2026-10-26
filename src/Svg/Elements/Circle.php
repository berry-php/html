<?php

declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

final class Circle extends SvgTag
{
    public function __construct()
    {
        parent::__construct('circle');
    }

    public function cx(int|string $value): static
    {
        return $this->attr('cx', (string) $value, escapeKey: false);
    }

    public function cy(int|string $value): static
    {
        return $this->attr('cy', (string) $value, escapeKey: false);
    }

    public function r(int|string $value): static
    {
        return $this->attr('r', (string) $value, escapeKey: false);
    }
}
