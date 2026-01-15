<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Wrap;
use Berry\Html\HtmlTag;

/**
 * The HTML <textarea> element represents a multi-line plain-text editing control, useful when you want to allow users to enter a sizeable amount of free-form text, for example a comment on a review or feedback form.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea
 */
class TextArea extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('textarea');
    }

    /**
     * Name of the form control.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#name
     */
    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    /**
     * The number of visible text lines for the control.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#rows
     */
    public function rows(int $rows): static
    {
        return $this->attr('rows', strval($rows));
    }

    /**
     * The visible width of the text control, in average character widths.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#cols
     */
    public function cols(int $cols): static
    {
        return $this->attr('cols', strval($cols));
    }

    /**
     * Hint for form-autofill feature.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#autocomplete
     */
    public function autocomplete(string|bool $value): static
    {
        if (is_bool($value)) {
            return $this->attr('autocomplete', $value ? 'on' : 'off');
        }

        return $this->attr('autocomplete', $value);
    }

    /**
     * Whether the control is disabled.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#disabled
     */
    public function disabled(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('disabled');
    }

    /**
     * The <form> element to associate the textarea with.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#form
     */
    public function form(string $formId): static
    {
        return $this->attr('form', $formId);
    }

    /**
     * The maximum number of characters that the user can enter.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#maxlength
     */
    public function maxlength(int $value): static
    {
        return $this->attr('maxlength', (string) $value);
    }

    /**
     * The minimum number of characters that the user can enter.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#minlength
     */
    public function minlength(int $value): static
    {
        return $this->attr('minlength', (string) $value);
    }

    /**
     * Placeholder text that appears when the control is empty.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#placeholder
     */
    public function placeholder(string $value): static
    {
        return $this->attr('placeholder', $value);
    }

    /**
     * Whether the control is read-only.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#readonly
     */
    public function readonly(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('readonly');
    }

    /**
     * Whether the control is required.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#required
     */
    public function required(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('required');
    }

    /**
     * Specifies how the control wraps text.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea#wrap
     */
    public function wrap(Wrap|string $value): static
    {
        return $this->attr('wrap', $value instanceof Wrap ? $value->value : $value);
    }
}
