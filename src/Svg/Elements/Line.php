<?php

declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

final class Line extends SvgTag
{
    public function __construct()
    {
        parent::__construct('line');
    }

    public function x1(int|string $value): static
    {
        return $this->attr('x1', (string) $value, escapeKey: false);
    }

    public function y1(int|string $value): static
    {
        return $this->attr('y1', (string) $value, escapeKey: false);
    }

    public function x2(int|string $value): static
    {
        return $this->attr('x2', (string) $value, escapeKey: false);
    }

    public function y2(int|string $value): static
    {
        return $this->attr('y2', (string) $value, escapeKey: false);
    }
}
