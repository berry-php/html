<?php declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

class Line extends SvgTag
{
    public function __construct()
    {
        parent::__construct('line');
    }

    public function x1(int|string $value): static
    {
        return $this->attr('x1', (string) $value);
    }

    public function y1(int|string $value): static
    {
        return $this->attr('y1', (string) $value);
    }

    public function x2(int|string $value): static
    {
        return $this->attr('x2', (string) $value);
    }

    public function y2(int|string $value): static
    {
        return $this->attr('y2', (string) $value);
    }
}
