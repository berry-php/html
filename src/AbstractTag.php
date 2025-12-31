<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasAttributesContract;
use Berry\Contract\HasExtensionMethodsContract;
use Berry\Contract\IsRenderableContract;
use Berry\Traits\HasAttributes;
use Berry\Traits\HasExtensionMethods;
use Berry\Traits\Renderable;

abstract class AbstractTag implements Element, HasAttributesContract, HasExtensionMethodsContract, IsRenderableContract
{
    use HasAttributes;
    use HasExtensionMethods;
    use Renderable;

    public function __construct(
        protected string $tagName
    ) {}

    /**
     * @param callable(static): static $fn
     */
    public function map(callable $fn): static
    {
        return $fn($this);
    }

    /**
     * @param (callable(): bool)|bool $condition
     * @param callable(static): static $fn
     */
    public function mapWhen(callable|bool $condition, callable $fn): static
    {
        if (is_callable($condition)) {
            return $this->mapWhen($condition(), $fn);
        }

        if ($condition) {
            return $fn($this);
        }

        return $this;
    }
}
