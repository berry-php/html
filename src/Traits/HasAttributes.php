<?php declare(strict_types=1);

namespace Berry\Traits;

use Stringable;

trait HasAttributes
{
    /** @var array<string, string|true>|null */
    protected ?array $attributes = null;

    public function attr(string $key, Stringable|string|int|float|bool $value): static
    {
        $this->attributes ??= [];
        $this->attributes[$key] = (string) $value;
        return $this;
    }

    public function flag(string $key): static
    {
        $this->attributes ??= [];
        $this->attributes[$key] = true;
        return $this;
    }

    public function getAttributes(): array
    {
        return $this->attributes ?? [];
    }
}
