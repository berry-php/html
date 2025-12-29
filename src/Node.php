<?php declare(strict_types=1);

namespace Berry;

use Berry\Traits\HasAttributes;
use Berry\Traits\HasExtensionMethods;

abstract class Node implements Renderable
{
    use HasAttributes;
    use HasExtensionMethods;

    /**
     * @var array<string, string>
     */
    protected array $attributes = [];

    /**
     * @var array<string, true>
     */
    protected array $flags = [];

    /**
     * @var Renderable[]
     */
    protected array $children = [];

    abstract protected static function tagName(): string;

    protected static function isSelfClosing(): bool
    {
        return false;
    }

    /**
     * @param callable(static): static $fn
     */
    public function map(callable $fn): static
    {
        return $fn($this);
    }

    /**
     * @param (callable(): bool)|bool $condition
     * @param callable(static): static $fn
     */
    public function mapWhen(callable|bool $condition, callable $fn): static
    {
        if (is_callable($condition)) {
            return $this->mapWhen($condition(), $fn);
        }

        if ($condition) {
            return $fn($this);
        }

        return $this;
    }

    /**
     * @param string[] $buffer
     */
    public function renderInto(array &$buffer): void
    {
        $tagName = static::tagName();
        $buffer[] = "<{$tagName}";

        foreach ($this->attributes as $key => $value) {
            $value = htmlspecialchars($value);
            $buffer[] = " {$key}=\"{$value}\"";
        }

        foreach ($this->flags as $flag => $_) {
            $buffer[] = " {$flag}";
        }

        if (static::isSelfClosing()) {
            $buffer[] = ' />';

            return;
        }

        $buffer[] = '>';

        foreach ($this->children as $child) {
            $child->renderInto($buffer);
        }

        $buffer[] = "</{$tagName}>";
    }

    public function toString(): string
    {
        $parts = [];
        $this->renderInto($parts);
        return implode('', $parts);
    }

    public function toArray(): array
    {
        return [
            static::class,
            array_merge($this->attributes, $this->flags),
            array_map(fn(Renderable $child) => $child->toArray(), $this->children),
        ];
    }
}
