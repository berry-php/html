<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <tbody> element encapsulates a set of table rows (<tr> elements), indicating that they comprise the body of the table (<table>).
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tbody
 */
class TBody extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('tbody');
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