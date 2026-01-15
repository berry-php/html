<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <option> element is used to define an item contained in a <select>, an <optgroup>, or a <datalist> element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/option
 */
class Option extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('option');
    }

    /**
     * The content of this attribute represents the value to be submitted with the form when this option is selected.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/option#value
     */
    public function value(string $value): static
    {
        return $this->attr('value', $value);
    }

    /**
     * If this Boolean attribute is set, this option is initially selected when the page loads.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/option#selected
     */
    public function selected(bool $selected = true): static
    {
        if (!$selected) {
            return $this;
        }

        return $this->flag('selected');
    }

    /**
     * If this Boolean attribute is set, this option is not checkable.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/option#disabled
     */
    public function disabled(bool $disabled = true): static
    {
        if (!$disabled) {
            return $this;
        }

        return $this->flag('disabled');
    }

    /**
     * This attribute is text for the label indicating the meaning of the option.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/option#label
     */
    public function label(string $value): static
    {
        return $this->attr('label', $value);
    }
}
