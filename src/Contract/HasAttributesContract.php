<?php

declare(strict_types=1);

namespace Berry\Contract;

use Stringable;

interface HasAttributesContract
{
    /**
     * Sets a standard key-value attribute on the component.
     *
     * Example: $el->attr('class', 'btn-primary') renders as `class="btn-primary"`.
     */
    public function attr(
        string $key,
        Stringable|string|int|float|bool $value,
        bool $escapeKey = true,
        bool $escapeValue = true,
    ): static;

    /**
     * Sets a boolean "flag" attribute on the component.
     *
     * Used for attributes that typically appear without a value in HTML.
     * Example: $el->flag('required') renders as `required`.
     */
    public function flag(string $key, bool $escapeKey = true): static;

    /**
     * @return array<string, string|true>
     */
    public function getAttributes(): array;
}
