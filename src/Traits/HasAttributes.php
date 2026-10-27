<?php

declare(strict_types=1);

namespace Berry\Traits;

use Berry\Escaper;
use Stringable;

trait HasAttributes
{
    /** @var array<string, string|true>|null */
    protected ?array $attributes = null;

    public function attr(
        string $key,
        Stringable|string|int|float|bool $value,
        bool $escapeKey = true,
        bool $escapeValue = true,
    ): static {
        $this->attributes ??= [];

        $key = $escapeKey ? Escaper::escapeAttributeName($key) : strval($key);
        $value = $escapeValue ? Escaper::escape((string) $value) : (string) $value;

        // skip empty keys
        if (strlen($key) === 0) {
            return $this;
        }

        $this->attributes[$key] = $value;
        return $this;
    }

    public function flag(string $key, bool $escapeKey = true): static
    {
        $this->attributes ??= [];

        $key = $escapeKey ? Escaper::escapeAttributeName($key) : $key;

        $this->attributes[$key] = true;
        return $this;
    }

    /** @return array<string, string|true> */
    public function getAttributes(): array
    {
        return $this->attributes ?? [];
    }
}
