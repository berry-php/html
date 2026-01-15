<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\Contract\HasChildrenContract;
use Berry\Contract\IsRenderableContract;
use Berry\Inspector\BerryInspector;
use Berry\Inspector\Inspector;
use Berry\Element;
use InvalidArgumentException;

/**
 * @phpstan-import-type DebugFrame from Inspector
 */
trait HasInspector
{
    /**
     * Returns an inspector for the current element
     *
     * @param DebugFrame[]|null $stacktrace
     */
    public function inspector(?Inspector $inspector = null, ?array $stacktrace = null): Element&IsRenderableContract
    {
        $inspector ??= new BerryInspector();
        return $inspector->dump($this, $stacktrace ?? debug_backtrace());
    }

    /**
     * Dump an inspector for the current element as a child (if possible) otherwise just print it
     *
     * @param DebugFrame[]|null $stacktrace
     */
    public function dump(bool $dumpAsChild = false, ?Inspector $inspector = null, ?array $stacktrace = null): static
    {
        $inspector = $this->inspector($inspector, $stacktrace ?? debug_backtrace());

        if ($dumpAsChild) {
            if ($this instanceof HasChildrenContract) {
                // Use the normal child() pathway to preserve ordering and flushing
                $this->child($inspector);
            } else {
                throw new InvalidArgumentException("Tried to dump inspector as a child when element doesn't support HasChildrenContract");
            }
        } else {
            echo $inspector->toString();
        }

        return $this;
    }

    /**
     * Dump an inspector for the current element to the page and stop rendering
     *
     * @param DebugFrame[]|null $stacktrace
     * @return never
     */
    public function dd(?Inspector $inspector = null, ?array $stacktrace = null): never
    {
        $inspector = $this->inspector($inspector, $stacktrace ?? debug_backtrace());
        die($inspector->toString());
    }
}
