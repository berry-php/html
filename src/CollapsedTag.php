<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasInspectorPropsContract;
use Berry\Rendering\Renderer;

final class CollapsedTag implements Element, HasInspectorPropsContract
{
    public function __construct(
        private string $tagName,
        private string $content
    ) {}

    public function inspectorProps(): array
    {
        return [
            'tag' => $this->tagName,
            'content' => $this->content,
        ];
    }

    public function render(Renderer $renderer): void
    {
        $renderer->write('<' . $this->tagName . '>' . $this->content . '</' . $this->tagName . '>');
    }
}
