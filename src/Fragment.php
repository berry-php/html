<?php declare(strict_types=1);

namespace Berry;

use Berry\Contracts\ExcludeFromArrayRepresentation;
use Berry\Traits\HasChildren;
use RuntimeException;

class Fragment extends Node
{
    use HasChildren;

    /**
     * @return never
     * @codeCoverageIgnore
     */
    protected static function tagName(): string
    {
        throw new RuntimeException("Fragment nodes don't have a tag");
    }

    /**
     * @param string[] $buffer
     */
    public function renderInto(array &$buffer): void
    {
        foreach ($this->children as $child) {
            if ($child === null) {
                continue;
            }

            $child->renderInto($buffer);
        }
    }

    public function toArray(): array
    {
        return [
            static::class,
            [],
            array_map(
                fn(Renderable $child) => $child->toArray(),
                array_filter($this->children, fn(Renderable|null $child) => $child !== null && !($child instanceof ExcludeFromArrayRepresentation))
            ),
        ];
    }
}
