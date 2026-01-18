<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <thead> element defines a set of rows defining the head of the columns of the table.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/thead
 */
class THead extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('thead');
    }

    /**
     * Adds a new tr element.
     * @param Element|(Closure(Tr): Tr)|null $config
     */
    public function tr(Element|Closure|null $config = null): static
    {
        $tr = new Tr();

        if ($config instanceof Closure) {
            $config($tr);
        } elseif ($config !== null) {
            $tr->child($config);
        }

        return $this->child($tr);
    }
}
