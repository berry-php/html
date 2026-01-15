<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasChildrenContract;
use Berry\Contract\IsRenderableContract;
use Berry\Rendering\Renderer;
use Berry\Traits\HasChildren;
use Berry\Traits\Renderable;

class Fragment implements Element, HasChildrenContract, IsRenderableContract
{
    use HasChildren;
    use Renderable;

    public function render(Renderer $renderer): void
    {
        foreach ($this->children ?? [] as $child) {
            $child?->render($renderer);
        }
    }
}
