<?php

declare(strict_types=1);

namespace Berry\Traits;

use Berry\Element;
use Closure;

trait HasChildren
{
    protected string $body = '';

    /** @param Element|(Closure(): (Element|null))|null $child */
    public function child(Element|Closure|null $child): static
    {
        if ($child === null) {
            return $this;
        }

        if ($child instanceof Closure) {
            $child = $child();
            if ($child === null) {
                return $this;
            }
        }

        $this->body .= $child->toString();

        return $this;
    }

    /**
     * @param (Closure(): bool)|bool $condition
     * @param Closure(): (Element|null) $child
     * @param (Closure(): (Element|null))|null $else
     */
    public function childWhen(Closure|bool $condition, Closure $child, ?Closure $else = null): static
    {
        if ($condition instanceof Closure) {
            return $this->childWhen($condition(), $child, $else);
        }

        if ($condition) {
            return $this->child($child);
        } elseif ($else !== null) {
            return $this->child($else);
        }

        return $this;
    }

    /**
     * @param iterable<Element|null>|(Closure(): iterable<Element|null>) $children
     * @param Element|(Closure(): Element)|null $else
     */
    public function children(iterable|Closure $children, Element|Closure|null $else = null): static
    {
        if ($children instanceof Closure) {
            $children = $children();
        }

        $empty = true;

        foreach ($children as $c) {
            $this->child($c);
            $empty = false;
        }

        return $empty ? $this->child($else) : $this;
    }
}
