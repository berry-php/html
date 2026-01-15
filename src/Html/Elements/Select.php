<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <select> element represents a control that provides a menu of options.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select
 */
class Select extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('select');
    }

    /**
     * Name of the form control.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select#name
     */
    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    /**
     * Whether the user can select more than one option.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select#multiple
     */
    public function multiple(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('multiple');
    }

    /**
     * Whether the control is disabled.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select#disabled
     */
    public function disabled(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('disabled');
    }

    /**
     * The <form> element to associate the select with.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select#form
     */
    public function form(string $formId): static
    {
        return $this->attr('form', $formId);
    }

    /**
     * Whether the control is required.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select#required
     */
    public function required(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('required');
    }

    /**
     * The number of visible options in a drop-down list.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select#size
     */
    public function size(int $value): static
    {
        return $this->attr('size', (string) $value);
    }

    /**
     * Hint for form-autofill feature.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select#autocomplete
     */
    public function autocomplete(string|bool $value): static
    {
        if (is_bool($value)) {
            return $this->attr('autocomplete', $value ? 'on' : 'off');
        }

        return $this->attr('autocomplete', $value);
    }
}
