<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <details> element creates a disclosure widget in which information is visible only when the widget is toggled into an "open" state.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details
 */
class Details extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('details');
    }

    /**
     * Adds a new summary element.
     * @param Element|(Closure(Summary): Summary)|null $config
     */
    public function summary(Element|Closure|null $config = null): static
    {
        $summary = new Summary();

        if ($config instanceof Closure) {
            $config($summary);
        } elseif ($config !== null) {
            $summary->child($config);
        }

        return $this->child($summary);
    }

    /**
     * This Boolean attribute indicates whether the details — that is, the contents of the <details> element — are currently visible.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details#open
     */
    public function open(bool $open = true): static
    {
        if (!$open) {
            return $this;
        }

        return $this->flag('open');
    }
}
