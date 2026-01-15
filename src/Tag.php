<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasChildrenContract;
use Berry\Contract\HasTextContract;
use Berry\Rendering\Escaper;
use Berry\Rendering\Renderer;
use Berry\Traits\HasChildren;

class Tag extends AbstractTag implements HasChildrenContract
{
    use HasChildren;

    /**
     * @internal Collapse Tag into a String if possible
     */
    public function collapseTag(): Element
    {
        // has attributes or children, cant collapse
        if (!empty($this->attributes) || !empty($this->children)) {
            return $this;
        }

        if ($this instanceof HasTextContract && $this->hasTextBuffer()) {
            $content = $this->stealTextBuffer();
            return new CollapsedTag($this->tagName(), $content);
        }

        return $this;
    }

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

        if (!empty($this->children)) {
            foreach ($this->children as $child) {
                $child?->render($renderer);
            }
        }

        if ($this instanceof HasTextContract && $this->hasTextBuffer()) {
            $renderer->write($this->stealTextBuffer());
        }

        $renderer->write("</{$this->tagName()}>");
    }
}
