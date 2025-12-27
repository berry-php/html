<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\TextNode;
use Stringable;

trait HasText
{
    public function text(Stringable|string|int|float|bool|callable|null $text, bool $raw = false): static
    {
        if ($text === null) {
            return $this;
        }

        if (is_callable($text)) {
            $text = $text();

            if ($text === null) {
                return $this;
            }

            assert(is_string($text));
        }

        $this->children[] = new TextNode((string) $text, $raw);

        return $this;
    }

    public function raw(Stringable|string|int|float|bool|callable|null $text): static
    {
        return $this->text($text, true);
    }
}
