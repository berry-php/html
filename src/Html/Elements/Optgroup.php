<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <optgroup> element creates a grouping of options within a <select> element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/optgroup
 */
class Optgroup extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('optgroup');
    }

    /**
     * If set, then none of the items in this option group is selectable.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/optgroup#disabled
     */
    public function disabled(bool $disabled = true): static
    {
        return $disabled ? $this->flag('disabled') : $this;
    }

    /**
     * The name of the group of options, which the browser can use when labeling the options in a hierarchical menu.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/optgroup#label
     */
    public function label(string $label): static
    {
        return $this->attr('label', $label);
    }
}