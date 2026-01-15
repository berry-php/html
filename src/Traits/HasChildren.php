<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\Contract\HasTextContract;
use Berry\Element;
use Closure;

trait HasChildren
{
    /**
     * @var array<Element|null>|null
     */
    protected ?array $children = null;

    public function child(Element|Closure|null $child): static
    {
        if ($child instanceof Closure) {
            $child = $child();
        }

        if ($child === null) {
            return $this;
        }

        // if has text buffered flush it first
        if ($this instanceof HasTextContract && method_exists($this, 'flushTextBufferIfPresent')) {
            $this->flushTextBufferIfPresent();
        }

        $this->children ??= [];
        $this->children[] = $child;

        return $this;
    }

    public function childWhen(Closure|bool $condition, Element|Closure|null $child): static
    {
        if ($condition instanceof Closure) {
            return $this->childWhen($condition(), $child);
        }

        if ($condition) {
            return $this->child($child);
        }

        return $this;
    }

    public function children(array|Closure $children, Element|Closure|null $else = null): static
    {
        if ($children instanceof Closure) {
            $children = $children();
        }

        if (count($children) === 0) {
            return $this->child($else);
        }

        if ($this instanceof HasTextContract && method_exists($this, 'flushTextBufferIfPresent')) {
            $this->flushTextBufferIfPresent();
        }

        $this->children ??= [];
        array_push($this->children, ...$children);

        return $this;
    }

    public function getChildren(): array
    {
        return $this->children ?? [];
    }
}
