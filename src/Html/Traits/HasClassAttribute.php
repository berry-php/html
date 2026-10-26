<?php

declare(strict_types=1);

namespace Berry\Html\Traits;

use Berry\Traits\HasAttributes;
use Closure;

trait HasClassAttribute
{
    use HasAttributes;

    /** @var string[]|null */
    protected ?array $classes = null;

    /**
     * Space-separated list of CSS classes.
     *
     * @param (Closure(): (string|string[]))|string|string[] $class
     */
    public function class(Closure|string|array $class): static
    {
        if ($class instanceof Closure) {
            $class = $class();
        }

        if (is_string($class)) {
            $class = explode(' ', $class);
        }

        // to mark the inserted position, this will be replaced later
        $this->attr('class', '', escapeKey: false, escapeValue: false);

        $this->classes ??= [];
        foreach ($class as $name) {
            $this->classes[] = trim($name);
        }

        return $this;
    }

    /**
     * Adds a class when a condition is true
     *
     * @param (Closure(): bool)|bool $condition
     * @param (Closure(): (string|string[]))|string[]|string $class
     * @param (Closure(): (string|string[]))|string[]|string|null $else
     */
    public function classWhen(
        Closure|bool $condition,
        Closure|array|string $class,
        Closure|array|string|null $else = null,
    ): static {
        if ($condition instanceof Closure) {
            return $this->classWhen($condition(), $class, $else);
        }

        if ($condition) {
            return $this->class($class);
        } elseif ($else !== null) {
            return $this->class($else);
        }

        return $this;
    }

    /**
     * Removes class/es from element
     *
     * @param (Closure(): (string|string[]))|string|string[] $class
     */
    public function removeClass(Closure|string|array $class): static
    {
        if ($class instanceof Closure) {
            $class = $class();
        }

        if (is_string($class)) {
            $class = explode(' ', $class);
        }

        if ($this->classes !== null) {
            $this->classes = array_filter($this->classes, static fn(string $c) => !in_array($c, $class, true));
        }

        return $this;
    }

    protected function classString(): string
    {
        return implode(' ', array_unique($this->classes ?? []));
    }
}
