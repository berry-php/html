<?php declare(strict_types=1);

namespace Berry\Contract;

use Berry\Element;
use Closure;

interface HasChildrenContract
{
    /**
     * Adds a child element
     *
     * @param Element|(Closure(): (Element|null))|null $child
     */
    public function child(Element|Closure|null $child): static;

    /**
     * Adds a child element conditionally
     *
     * @param (Closure(): bool)|bool $condition
     * @param Closure(): (Element|null) $child
     * @param (Closure(): (Element|null))|null $else
     */
    public function childWhen(Closure|bool $condition, Closure $child, ?Closure $else = null): static;

    /**
     * Adds multiple children at once
     *
     * @param array<Element|null>|(Closure(): array<Element|null>) $children
     * @param Element|(Closure(): Element)|null $else Called when the list of children is empty
     */
    public function children(array|Closure $children, Element|Closure|null $else = null): static;

    /**
     * Returns the list of children added to this element
     *
     * @return array<Element|null>
     */
    public function getChildren(): array;
}
