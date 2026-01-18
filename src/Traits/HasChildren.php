<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\Contract\HasTextContract;
use Berry\Element;
use Berry\Str;
use Berry\Tag;
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

        // Collapse simple leaf tags fast
        if ($child instanceof Tag) {
            $child = $child->collapseTag();
        }

        $this->children ??= [];

        // if has text buffered flush it first
        if ($this instanceof HasTextContract && $this->hasTextBuffer()) {
            $this->children[] = new Str($this->stealTextBuffer());
        }

        $this->children[] = $child;

        return $this;
    }

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

    public function children(array|Closure $children, Element|Closure|null $else = null): static
    {
        if ($children instanceof Closure) {
            $children = $children();
        }

        if (count($children) === 0) {
            return $this->child($else);
        }

        $this->children ??= [];

        // if has text buffered flush it first
        if ($this instanceof HasTextContract && $this->hasTextBuffer()) {
            $this->children[] = new Str($this->stealTextBuffer());
        }

        foreach ($children as $c) {
            if ($c instanceof Tag) {
                $c = $c->collapseTag();
            }
            $this->children[] = $c;
        }

        return $this;
    }

    public function getChildren(): array
    {
        return $this->children ?? [];
    }
}
