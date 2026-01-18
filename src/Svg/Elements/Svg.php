<?php declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Rendering\Renderer;
use Berry\Svg\SvgTag;

class Svg extends SvgTag
{
    private bool $standalone = false;

    public function __construct()
    {
        parent::__construct('svg');
        $this->attr('xmlns', 'http://www.w3.org/2000/svg');
    }

    public function standalone(bool $value = true): static
    {
        $this->standalone = $value;
        return $this;
    }

    public function render(Renderer $renderer): void
    {
        if ($this->standalone) {
            $renderer->write('<?xml version="1.0" encoding="UTF-8"?>');
            $renderer->write('<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">');
        }
        
        parent::render($renderer);
    }
}
