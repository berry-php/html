<?php

declare(strict_types=1);

namespace Berry\Contract;

use Closure;
use Stringable;

interface HasTextContract
{
    /**
     * Adds a text node to the element
     *
     * @param Stringable|string|int|float|bool|(Closure(): string|null)|null $text
     */
    public function text(Stringable|string|int|float|bool|Closure|null $text): static;

    /**
     * Adds a raw text node to the element
     *
     * @param Stringable|string|int|float|bool|(Closure(): string|null)|null $text
     */
    public function unsafeRaw(Stringable|string|int|float|bool|Closure|null $text): static;
}
