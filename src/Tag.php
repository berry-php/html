<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasChildrenContract;
use Berry\Rendering\Escaper;
use Berry\Rendering\Renderer;
use Berry\Traits\HasChildren;

class Tag extends AbstractTag implements HasChildrenContract
{
    use HasChildren;

    public function render(Renderer $renderer): void
    {
        $renderer->write("<{$this->tagName()}");

        foreach ($this->getAttributes() as $key => $value) {
            $key = Escaper::escapeAttributeName(strval($key));

            // if the string was escaped away, skip it
            if (strlen($key) === 0) {
                continue;
            }

            // flags
            if ($value === true) {
                $renderer->write(" $key");
                continue;
            }

            $escaped = Escaper::escape($value);
            $renderer->write(" {$key}=\"{$escaped}\"");
        }

        $renderer->write('>');

        foreach ($this->children ?? [] as $child) {
            $child?->render($renderer);
        }

        $renderer->write("</{$this->tagName()}>");
    }
}
