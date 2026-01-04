<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\IsRenderableContract;
use Berry\Rendering\Renderer;
use Berry\Traits\Renderable;

abstract class Component implements Element, IsRenderableContract
{
    use Renderable;

    abstract public function renderComponent(): Element;

    public function render(Renderer $renderer): void
    {
        $this->renderComponent()->render($renderer);
    }
}
