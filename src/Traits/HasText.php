<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\Rendering\Escaper;
use Berry\Rendering\Renderer;
use Berry\Str;
use Closure;
use Stringable;

trait HasText
{
    /**
     * Pre-rendered text buffer. Already escaped for text(), raw for unsafeRaw().
     */
    protected ?string $textBuffer = null;

    /**
     * Flush buffered text into a child node
     */
    protected function flushTextBufferIfPresent(): void
    {
        if ($this->textBuffer !== null && $this->textBuffer !== '') {
            $this->children[] = new Str($this->textBuffer);
            $this->textBuffer = null;
        }
    }

    /**
     * Write buffered text (if any) directly to renderer.
     */
    protected function writeBufferedText(Renderer $renderer): void
    {
        if ($this->textBuffer !== null && $this->textBuffer !== '') {
            $renderer->write($this->textBuffer);
        }
    }

    /** Internal: true if there is buffered text */
    public function hasTextBuffer(): bool
    {
        return $this->textBuffer !== null && $this->textBuffer !== '';
    }

    /** Internal: returns buffered text and clears the buffer */
    public function stealTextBuffer(): string
    {
        $buf = $this->textBuffer ?? '';
        $this->textBuffer = null;
        return $buf;
    }

    /**
     * Adds a text node to the element (escaped immediately)
     *
     * @param Stringable|string|int|float|bool|(Closure(): (string|int|float|bool|null))|null $text
     */
    public function text(Stringable|string|int|float|bool|Closure|null $text): static
    {
        if ($text instanceof Closure) {
            $text = $text();
        }

        if ($text === null) {
            return $this;
        }

        $this->textBuffer = ($this->textBuffer ?? '') . Escaper::escape((string) $text);
        return $this;
    }

    /**
     * Adds a raw text node to the element (unescaped)
     *
     * @param Stringable|string|int|float|bool|(Closure(): (string|int|float|bool|null))|null $text
     */
    public function unsafeRaw(Stringable|string|int|float|bool|Closure|null $text): static
    {
        if ($text instanceof Closure) {
            $text = $text();
        }

        if ($text === null) {
            return $this;
        }

        $this->textBuffer = ($this->textBuffer ?? '') . (string) $text;
        return $this;
    }
}
