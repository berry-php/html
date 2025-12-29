<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\Renderable;

trait HasChildren
{
    /** @var array<Renderable|null> */
    protected array $children = [];

    /**
     * @param Renderable|(callable(): Renderable)|null $child
     */
    public function child(Renderable|callable|null $child): static
    {
        if ($child === null) {
            return $this;
        }

        if (is_callable($child)) {
            $child = $child();

            if ($child === null) {
                return $this;
            }

            assert($child instanceof Renderable);
        }

        $this->children[] = $child;

        return $this;
    }

    /**
     * @param (callable(): bool)|bool $condition
     * @param Renderable|(callable(): Renderable)|null $child
     */
    public function childWhen(callable|bool $condition, Renderable|callable|null $child): static
    {
        if (is_callable($condition)) {
            return $this->childWhen($condition(), $child);
        }

        if ($condition) {
            return $this->child($child);
        }

        return $this;
    }

    /**
     * @param Renderable[] $children
     */
    public function children(array $children): static
    {
        array_push($this->children, ...$children);
        return $this;
    }
}
