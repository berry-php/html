<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <tfoot> element defines a set of rows summarizing the columns of the table.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tfoot
 */
class TFoot extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('tfoot');
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
