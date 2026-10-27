<?php

declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;
use Override;

final class Svg extends SvgTag
{
    private bool $standalone = false;

    public function __construct()
    {
        parent::__construct('svg');
        $this->attr('xmlns', 'http://www.w3.org/2000/svg', escapeKey: false);
    }

    public function standalone(bool $value = true): static
    {
        $this->standalone = $value;
        return $this;
    }

    #[Override]
    public function toString(): string
    {
        $out = '';

        if ($this->standalone) {
            $out .= '<?xml version="1.0" encoding="UTF-8"?>';
            $out .= '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
        }

        return $out . parent::toString();
    }
}
