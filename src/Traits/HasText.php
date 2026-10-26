<?php

declare(strict_types=1);

namespace Berry\Traits;

use Berry\Escaper;
use Closure;
use Stringable;

trait HasText
{
    protected string $body = '';

    /**
     * Adds a text node to the element (escaped immediately)
     *
     * @param Stringable|string|int|float|bool|(Closure(): (string|int|float|bool|null))|null $text
     */
    public function text(Stringable|string|int|float|bool|Closure|null $text): static
    {
        if ($text === null) {
            return $this;
        }

        if ($text instanceof Closure) {
            $text = $text();
            if ($text === null) {
                return $this;
            }
        }

        $this->body .= Escaper::escape((string) $text);

        return $this;
    }

    /**
     * Adds a raw text node to the element (unescaped)
     *
     * @param Stringable|string|int|float|bool|(Closure(): (string|int|float|bool|null))|null $text
     */
    public function unsafeRaw(Stringable|string|int|float|bool|Closure|null $text): static
    {
        if ($text === null) {
            return $this;
        }

        if ($text instanceof Closure) {
            $text = $text();
            if ($text === null) {
                return $this;
            }
        }

        $this->body .= (string) $text;

        return $this;
    }
}
