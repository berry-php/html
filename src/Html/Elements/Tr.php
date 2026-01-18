<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <tr> element defines a row of cells in a table.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tr
 */
class Tr extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('tr');
    }

    /**
     * Adds a new td element.
     * @param Element|(Closure(Td): Td)|null $config
     */
    public function td(Element|Closure|null $config = null): static
    {
        $td = new Td();

        if ($config instanceof Closure) {
            $config($td);
        } elseif ($config !== null) {
            $td->child($config);
        }

        return $this->child($td);
    }

    /**
     * Adds a new th element.
     * @param Element|(Closure(Th): Th)|null $config
     */
    public function th(Element|Closure|null $config = null): static
    {
        $th = new Th();

        if ($config instanceof Closure) {
            $config($th);
        } elseif ($config !== null) {
            $th->child($config);
        }

        return $this->child($th);
    }
}