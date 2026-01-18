<?php declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

class Path extends SvgTag
{
    public function __construct()
    {
        parent::__construct('path');
    }

    public function d(string $d): static
    {
        return $this->attr('d', $d);
    }
}
