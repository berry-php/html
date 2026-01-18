<?php declare(strict_types=1);

namespace Berry\Xml;

use Berry\Rendering\Renderer;

class Root extends Element
{
    public function render(Renderer $renderer): void
    {
        $renderer->write('<?xml version="1.0" encoding="UTF-8"?>');
        parent::render($renderer);
    }
}
