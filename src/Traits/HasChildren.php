<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\Node;

trait HasChildren
{
    /** @var Node[] */
    protected array $children = [];

    /**
     * @param Node|callable(): Node|null $child
     */
    public function child(Node|callable|null $child): self
    {
        if ($child === null) {
            return $this;
        }

        if (is_callable($child)) {
            $child = $child();

            if ($child === null) {
                return $this;
            }

            assert($child instanceof Node);
        }

        $this->children[] = $child;

        return $this;
    }

    public function childWhen(callable|bool $condition, Node|callable|null $child): self
    {
        if (is_callable($condition)) {
            if ($condition()) {
                return $this->child($child);
            }

            return $this;
        }

        if ($condition) {
            return $this->child($child);
        }

        return $this;
    }
}
