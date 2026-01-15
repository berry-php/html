<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasInspectorPropsContract;
use Berry\Rendering\Renderer;

final class Str implements Element, HasInspectorPropsContract
{
    public function __construct(
        private string $content
    ) {}

    public function inspectorProps(): array
    {
        return [
            'content' => $this->content,
        ];
    }

    public function render(Renderer $renderer): void
    {
        $renderer->write($this->content);
    }
}
