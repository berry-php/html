<?php

declare(strict_types=1);

namespace Berry\Html\Traits;

use Berry\Html\Elements\Option;
use Closure;

trait HasOptions
{
    /**
     * Add an option with a label or configure its value, label and state.
     * Existing callbacks returning a label string are also supported.
     *
     * @param string|(Closure(Option): mixed)|null $content
     */
    public function option(string|Closure|null $content = null): static
    {
        $option = new Option();

        if ($content instanceof Closure) {
            $content = $content($option);
        }

        if (is_string($content)) {
            $option->text($content);
        }

        return $this->child($option);
    }
}
