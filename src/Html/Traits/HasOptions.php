<?php

declare(strict_types=1);

namespace Berry\Html\Traits;

use Berry\Html\Elements\Option;
use Berry\Traits\HasChildren;
use Closure;

trait HasOptions
{
    use HasChildren;

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
            // Configuration callbacks may return anything; only string labels are used.
            // @mago-expect analysis:mixed-assignment
            $content = $content($option);
        }

        if (is_string($content)) {
            $option->text($content);
        }

        return $this->child($option);
    }
}
