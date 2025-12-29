<?php declare(strict_types=1);

namespace Berry\Traits;

use Berry\Debug\BerryInspector;
use Berry\Debug\Inspector;

trait HasInspector
{
    /** @var array<Renderable|null> */
    protected array $children = [];

    public function dump(bool $dumpAsChild = false, ?Inspector $inspector = null): static
    {
        $inspector ??= new BerryInspector();

        $dump = $inspector->dump($this, debug_backtrace());

        // only use dumpAsChild for elements having `HasChildren`
        if (method_exists($this, 'child') && $dumpAsChild) {
            $this->children[] = $dump;
        } else {
            echo $dump->toString();
        }

        return $this;
    }
}
