<?php declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

class Circle extends SvgTag
{
    public function __construct()
    {
        parent::__construct('circle');
    }

    public function cx(int|string $value): static
    {
        return $this->attr('cx', (string) $value);
    }

    public function cy(int|string $value): static
    {
        return $this->attr('cy', (string) $value);
    }

    public function r(int|string $value): static
    {
        return $this->attr('r', (string) $value);
    }
}
