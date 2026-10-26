<?php

declare(strict_types=1);

namespace Berry\Contract;

use Closure;

interface HasExtensionMethodsContract
{
    /**
     * @param (Closure(static, mixed...): static) $extensionMethod
     */
    public static function addMethod(string $name, Closure $extensionMethod): void;

    /**
     * @param mixed[] $arguments
     */
    public function __call(string $name, array $arguments): mixed;
}
