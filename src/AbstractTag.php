<?php declare(strict_types=1);

namespace Berry;

use Berry\Contract\HasAttributesContract;
use Berry\Contract\HasExtensionMethodsContract;
use Berry\Contract\IsRenderableContract;
use Berry\Traits\HasAttributes;
use Berry\Traits\HasExtensionMethods;
use Berry\Traits\Renderable;
use Closure;

abstract class AbstractTag implements Element, HasAttributesContract, HasExtensionMethodsContract, IsRenderableContract
{
    use HasAttributes;
    use HasExtensionMethods;
    use Renderable;

    /** @var array<class-string, string> */
    private static array $tagNameMap = [];

    public function __construct(string $tagName)
    {
        // cache tag name per subclass to avoid per-instance property
        self::$tagNameMap[static::class] = $tagName;
    }

    protected function tagName(): string
    {
        return self::$tagNameMap[static::class] ?? '';
    }

    /**
     * @param Closure(static): static $fn
     */
    public function map(Closure $fn): static
    {
        return $fn($this);
    }

    /**
     * @param (Closure(): bool)|bool $condition
     * @param Closure(static): static $fn
     */
    public function mapWhen(Closure|bool $condition, Closure $fn): static
    {
        if ($condition instanceof Closure) {
            return $this->mapWhen($condition(), $fn);
        }

        if ($condition) {
            return $fn($this);
        }

        return $this;
    }
}
