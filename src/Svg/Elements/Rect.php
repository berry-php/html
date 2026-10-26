<?php

declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

final class Rect extends SvgTag
{
    public function __construct()
    {
        parent::__construct('rect');
    }

    public function x(int|string $value): static
    {
        return $this->attr('x', (string) $value, escapeKey: false);
    }

    public function y(int|string $value): static
    {
        return $this->attr('y', (string) $value, escapeKey: false);
    }

    public function width(int|string $value): static
    {
        return $this->attr('width', (string) $value, escapeKey: false);
    }

    public function height(int|string $value): static
    {
        return $this->attr('height', (string) $value, escapeKey: false);
    }

    public function rx(int|string $value): static
    {
        return $this->attr('rx', (string) $value, escapeKey: false);
    }

    public function ry(int|string $value): static
    {
        return $this->attr('ry', (string) $value, escapeKey: false);
    }
}
