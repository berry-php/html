<?php declare(strict_types=1);

namespace Berry\Debug;

use Berry\Renderable;

/**
 * Interface for rendering debug representations of elements
 *
 * @phpstan-type DebugFrame array{
 *      file?: string,
 *      line?: int,
 *      function?: string,
 *      class?: class-string,
 *      type?: '::'|'->',
 *      args?: array<mixed>,
 *      object?: object
 * }
 */
interface Inspector
{
    /**
     * Dumps a debug representation of $element into a new element
     *
     * @param DebugFrame[]|null $stacktrace
     */
    public function dump(Renderable $element, ?array $stacktrace = null): Renderable;
}
