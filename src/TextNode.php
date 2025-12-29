<?php declare(strict_types=1);

namespace Berry;

use RuntimeException;

final class TextNode extends Node
{
    public function __construct(
        private string $text,
        private bool $raw = false,
    ) {}

    /**
     * @return never
     * @codeCoverageIgnore
     */
    protected static function tagName(): string
    {
        throw new RuntimeException("Text nodes don't have a tag");
    }

    /**
     * @param string[] $buffer
     */
    public function renderInto(array &$buffer): void
    {
        if ($this->raw) {
            $buffer[] = $this->text;
            return;
        }

        $buffer[] = htmlspecialchars($this->text);
    }

    public function toArray(): array
    {
        return [
            static::class,
            ['content' => $this->text, 'raw' => $this->raw],
            []
        ];
    }
}
