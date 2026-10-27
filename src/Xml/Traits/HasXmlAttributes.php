<?php

declare(strict_types=1);

namespace Berry\Xml\Traits;

use Berry\Escaper;
use Stringable;

/** XML-specific escaping; ordinary HTML attributes keep their existing fast path. */
trait HasXmlAttributes
{
    /** @var array<string, string|true>|null */
    protected ?array $attributes = null;

    public function attr(
        string $key,
        Stringable|string|int|float|bool $value,
        bool $escapeKey = true,
        bool $escapeValue = true,
    ): static {
        $key = $escapeKey ? Escaper::xmlName($key) : $key;
        $this->attributes[$key] = $escapeValue ? Escaper::escapeXml((string) $value) : (string) $value;
        return $this;
    }

    public function flag(string $key, bool $escapeKey = true): static
    {
        return $this->attr($key, 'true', escapeKey: $escapeKey);
    }
}
