<?php

declare(strict_types=1);

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
     * Consumes children once and renders each child immediately.
     *
     * @param iterable<Element|null>|(Closure(): iterable<Element|null>) $children
     * @param Element|(Closure(): Element)|null $else Called when the list of children is empty
     */
    public function children(iterable|Closure $children, Element|Closure|null $else = null): static;
}
