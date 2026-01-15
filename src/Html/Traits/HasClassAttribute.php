<?php declare(strict_types=1);

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
        $this->attr('class', '');

        $this->classes ??= [];
        array_push($this->classes, ...$class);
        $this->classes = array_values(array_unique(array_map(fn(string $class) => trim($class), $this->classes)));

        return $this;
    }

    /**
     * @param (Closure(): bool)|bool $condition
     * @param (Closure(): (string|string[]))|string|string[] $class
     */
    public function classWhen(Closure|bool $condition, Closure|string|array $class): static
    {
        if ($condition instanceof Closure) {
            return $this->classWhen($condition(), $class);
        }

        if ($condition) {
            return $this->class($class);
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
            $this->classes = array_filter($this->classes, fn(string $c) => !in_array($c, $class, true));
        }

        return $this;
    }

    protected function classString(): string
    {
        return implode(' ', $this->classes ?? []);
    }

    /**
     * @return string[]
     */
    public function getClasses(): array
    {
        return $this->classes ?? [];
    }
}
