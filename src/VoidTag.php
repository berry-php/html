<?php declare(strict_types=1);

namespace Berry;

use Berry\Rendering\Escaper;
use Berry\Rendering\Renderer;

class VoidTag extends AbstractTag
{
    public function render(Renderer $renderer): void
    {
        $renderer->write("<{$this->tagName}");

        foreach ($this->getAttributes() as $key => $value) {
            $key = Escaper::escapeAttributeName(strval($key));

            // if the string was escaped away, skip it
            if (strlen($key) === 0) {
                continue;
            }

            // flags
            if ($value === true) {
                $renderer->write(" {$key}");
                continue;
            }

            $escaped = Escaper::escape($value);
            $renderer->write(" {$key}=\"$escaped\"");
        }

        $renderer->write(' />');
    }
}
