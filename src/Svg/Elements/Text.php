<?php declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

class Text extends SvgTag
{
    public function __construct()
    {
        parent::__construct('text');
    }

    public function x(int|string $value): static
    {
        return $this->attr('x', (string) $value);
    }

    public function y(int|string $value): static
    {
        return $this->attr('y', (string) $value);
    }
}
