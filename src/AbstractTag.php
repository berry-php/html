<?php

declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasAttributesContract;
use Berry\Contract\HasExtensionMethodsContract;
use Berry\Traits\HasAttributes;
use Berry\Traits\HasExtensionMethods;
use Closure;

abstract class AbstractTag implements Element, HasAttributesContract, HasExtensionMethodsContract
{
    use HasAttributes;
    use HasExtensionMethods;

    protected string $tagName;

    public function __construct(string $tagName)
    {
        $this->tagName = $tagName;
    }

    /**
     * @param Closure(static): static $fn
     */
    public function map(Closure $fn): static
    {
        return $fn($this);
    }

    /**
     * @param (Closure(): bool)|bool $condition
     * @param Closure(static): static $fn
     * @param (Closure(static): static)|null $else
     */
    public function mapWhen(Closure|bool $condition, Closure $fn, ?Closure $else = null): static
    {
        if ($condition instanceof Closure) {
            return $this->mapWhen($condition(), $fn, $else);
        }

        if ($condition) {
            return $fn($this);
        } elseif ($else !== null) {
            return $else($this);
        }

        return $this;
    }

    protected function renderAttributeList(): string
    {
        $attributes = $this->getAttributes();

        if (count($attributes) === 0) {
            return '';
        }

        $out = '';

        foreach ($attributes as $key => $value) {
            if (strlen(strval($key)) === 0) {
                continue;
            }

            // handle flags
            if ($value === true) {
                $out .= " {$key}";
                continue;
            }

            $out .= " {$key}=\"{$value}\"";
        }

        return $out;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
