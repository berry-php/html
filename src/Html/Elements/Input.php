<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\FormMethod;
use Berry\Html\Enums\InputType;
use Berry\Html\Enums\Target;
use Berry\Html\HtmlVoidTag;

/**
 * The HTML <input> element is used to create interactive controls for web-based forms in order to accept data from the user.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
 */
class Input extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    /**
     * How an <input> works varies considerably depending on the value of its type attribute.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#type
     */
    public function type(InputType|string $type): static
    {
        return $this->attr('type', $type instanceof InputType ? $type->value : $type);
    }

    /**
     * Name of the form control. Submitted with the form as part of a name/value pair.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#name
     */
    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    /**
     * Current value of the form control. Submitted with the form as part of a name/value pair.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#value
     */
    public function value(string $value): static
    {
        return $this->attr('value', $value);
    }

    /**
     * Whether the control is checked.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#checked
     */
    public function checked(bool $checked = true): static
    {
        if (!$checked) {
            return $this;
        }

        return $this->flag('checked');
    }

    /**
     * Hint for expected file type in file upload controls.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#accept
     */
    public function accept(string $value): static
    {
        return $this->attr('accept', $value);
    }

    /**
     * Specifies which camera to use for capture of image or video data, if the accept attribute indicated that the input should be of one of those types.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#capture
     */
    public function capture(string|bool $value = true): static
    {
        if (is_bool($value)) {
            return $value ? $this->flag('capture') : $this;
        }

        return $this->attr('capture', $value);
    }

    /**
     * Indicates whether the value of the control can be automatically completed by the browser.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#autocomplete
     */
    public function autocomplete(bool|string $value): static
    {
        if (is_bool($value)) {
            return $this->attr('autocomplete', $value ? 'on' : 'off');
        }

        return $this->attr('autocomplete', $value);
    }

    /**
     * Text that appears in the form control when it has no value.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#placeholder
     */
    public function placeholder(string $placeholder): static
    {
        return $this->attr('placeholder', $placeholder);
    }

    /**
     * The <form> element to associate the input with (its form owner).
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#form
     */
    public function form(string $formId): static
    {
        return $this->attr('form', $formId);
    }

    /**
     * The URL that processes the information submitted by the input.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#formaction
     */
    public function formaction(string $value): static
    {
        return $this->attr('formaction', $value);
    }

    /**
     * If the input is a submit button or image, this attribute specifies how the form data should be encoded when submitted to the server.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#formenctype
     */
    public function formenctype(string $value): static
    {
        return $this->attr('formenctype', $value);
    }

    /**
     * If the input is a submit button or image, this attribute specifies the HTTP method used to submit the form.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#formmethod
     */
    public function formmethod(FormMethod|string $value): static
    {
        return $this->attr('formmethod', $value instanceof FormMethod ? $value->value : $value);
    }

    /**
     * If the input is a submit button or image, this Boolean attribute specifies that the form is not to be validated when it is submitted.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#formnovalidate
     */
    public function formnovalidate(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('formnovalidate');
    }

    /**
     * If the input is a submit button or image, this attribute is a user-defined name or standardized keyword that indicates where to display the response that is received after submitting the form.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#formtarget
     */
    public function formtarget(Target|string $value): static
    {
        return $this->attr('formtarget', $value instanceof Target ? $value->value : $value);
    }

    /**
     * The id of a <datalist> element that contains the options for the input.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#list
     */
    public function list(string $value): static
    {
        return $this->attr('list', $value);
    }

    /**
     * The maximum value for the input.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#max
     */
    public function max(string|int|float $value): static
    {
        return $this->attr('max', (string) $value);
    }

    /**
     * The minimum value for the input.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#min
     */
    public function min(string|int|float $value): static
    {
        return $this->attr('min', (string) $value);
    }

    /**
     * The maximum number of characters that the user can enter.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#maxlength
     */
    public function maxlength(int $value): static
    {
        return $this->attr('maxlength', (string) $value);
    }

    /**
     * The minimum number of characters that the user can enter.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#minlength
     */
    public function minlength(int $value): static
    {
        return $this->attr('minlength', (string) $value);
    }

    /**
     * Whether the user can enter more than one value.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#multiple
     */
    public function multiple(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('multiple');
    }

    /**
     * A regular expression that the control's value is checked against.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#pattern
     */
    public function pattern(string $value): static
    {
        return $this->attr('pattern', $value);
    }

    /**
     * Whether the control is read-only.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#readonly
     */
    public function readonly(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('readonly');
    }

    /**
     * Whether the control is required for form submission.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#required
     */
    public function required(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('required');
    }

    /**
     * The size of the control.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#size
     */
    public function size(int $value): static
    {
        return $this->attr('size', (string) $value);
    }

    /**
     * The step interval for the input.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#step
     */
    public function step(string|int|float $value): static
    {
        return $this->attr('step', (string) $value);
    }

    /**
     * Alt text for image inputs.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#alt
     */
    public function alt(string $value): static
    {
        return $this->attr('alt', $value);
    }

    /**
     * Src for image inputs.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#src
     */
    public function src(string $value): static
    {
        return $this->attr('src', $value);
    }

    /**
     * Width for image inputs.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#width
     */
    public function width(int|string $value): static
    {
        return $this->attr('width', (string) $value);
    }

    /**
     * Height for image inputs.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#height
     */
    public function height(int|string $value): static
    {
        return $this->attr('height', (string) $value);
    }
}
