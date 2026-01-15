<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\ButtonType;
use Berry\Html\Enums\FormMethod;
use Berry\Html\Enums\Target;
use Berry\Html\HtmlTag;

/**
 * The HTML <button> element is an interactive element activated by a user with a mouse, keyboard, finger, voice command, or other assistive technology. Once activated, it then performs an action, such as submitting a form or opening a dialog.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button
 */
class Button extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('button');
    }

    /**
     * The default behavior of the button.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#type
     */
    public function type(ButtonType|string $type): static
    {
        return $this->attr('type', $type instanceof ButtonType ? $type->value : $type);
    }

    /**
     * The name of the button, submitted as a pair with the button's value as part of the form data.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#name
     */
    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    /**
     * Defines the value associated with the button's name when it's submitted with the form data.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#value
     */
    public function value(string $value): static
    {
        return $this->attr('value', $value);
    }

    /**
     * This Boolean attribute prevents the user from interacting with the button.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#disabled
     */
    public function disabled(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('disabled');
    }

    /**
     * The <form> element to associate the button with (its form owner).
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#form
     */
    public function form(string $formId): static
    {
        return $this->attr('form', $formId);
    }

    /**
     * The URL that processes the information submitted by the button.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#formaction
     */
    public function formaction(string $value): static
    {
        return $this->attr('formaction', $value);
    }

    /**
     * If the button is a submit button, this attribute specifies how the form data should be encoded when submitted to the server.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#formenctype
     */
    public function formenctype(string $value): static
    {
        return $this->attr('formenctype', $value);
    }

    /**
     * If the button is a submit button, this attribute specifies the HTTP method used to submit the form.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#formmethod
     */
    public function formmethod(FormMethod|string $value): static
    {
        return $this->attr('formmethod', $value instanceof FormMethod ? $value->value : $value);
    }

    /**
     * If the button is a submit button, this Boolean attribute specifies that the form is not to be validated when it is submitted.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#formnovalidate
     */
    public function formnovalidate(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('formnovalidate');
    }

    /**
     * If the button is a submit button, this attribute is a user-defined name or standardized keyword that indicates where to display the response that is received after submitting the form.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#formtarget
     */
    public function formtarget(Target|string $value): static
    {
        return $this->attr('formtarget', $value instanceof Target ? $value->value : $value);
    }
}
