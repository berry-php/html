<?php declare(strict_types=1);

namespace Berry\Traits;

use BadMethodCallException;
use Closure;

trait HasExtensionMethods
{
    /**
     * @var array<array<string , Closure(static, mixed...): static>>
     */
    protected static array $extensionMethods = [];

    /**
     * @param (Closure(static, mixed...): static) $extensionMethod
     */
    public static function addMethod(string $name, Closure $extensionMethod): void
    {
        static::$extensionMethods[static::class] ??= [];
        static::$extensionMethods[static::class][$name] = $extensionMethod;
    }

    /**
     * @param mixed[] $arguments
     */
    public function __call(string $name, array $arguments): static
    {
        $func = static::findExtensionMethod($name);

        if ($func === null) {
            throw new BadMethodCallException("Could not find method $name");
        }

        return $func($this, ...$arguments);
    }

    /**
     * @return (Closure(static, mixed...): static)|null
     */
    protected static function findExtensionMethod(string $name): Closure|null
    {
        // if we have it return it
        if (isset(static::$extensionMethods[static::class][$name])) {
            return static::$extensionMethods[static::class][$name];
        }

        // if not look at parent class
        $parent = get_parent_class(static::class);

        if ($parent && method_exists($parent, 'findExtensionMethod')) {
            $res = $parent::findExtensionMethod($name);
            assert(is_null($res) || $res instanceof Closure);
            return $res;
        }

        return null;
    }
}
