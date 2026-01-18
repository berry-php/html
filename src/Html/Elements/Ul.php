<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <ul> element represents an unordered list of items.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul
 */
class Ul extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('ul');
    }

    /**
     * Adds a new li element.
     * @param Element|(Closure(Li): Li)|null $config
     */
    public function li(Element|Closure|null $config = null): static
    {
        $li = new Li();

        if ($config instanceof Closure) {
            $config($li);
        } elseif ($config !== null) {
            $li->child($config);
        }

        return $this->child($li);
    }
}
