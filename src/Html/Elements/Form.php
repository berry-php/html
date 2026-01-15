<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\FormMethod;
use Berry\Html\Enums\Rel;
use Berry\Html\Enums\Target;
use Berry\Html\HtmlTag;

/**
 * The HTML <form> element represents a document section containing interactive controls for submitting information.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form
 */
class Form extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('form');
    }

    /**
     * The URL that processes the form submission.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#action
     */
    public function action(string $action): static
    {
        return $this->attr('action', $action);
    }

    /**
     * The HTTP method to submit the form with.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#method
     */
    public function method(FormMethod|string $method): static
    {
        return $this->attr('method', $method instanceof FormMethod ? $method->value : $method);
    }

    /**
     * The name of the form.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#name
     */
    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }

    /**
     * If the value of the method attribute is post, enctype is the MIME type of the form submission.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#enctype
     */
    public function enctype(string $value): static
    {
        return $this->attr('enctype', $value);
    }

    /**
     * This Boolean attribute indicates that the form shouldn't be validated when submitted.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#novalidate
     */
    public function novalidate(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('novalidate');
    }

    /**
     * Indicates where to display the response after submitting the form.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#target
     */
    public function target(Target|string $target): static
    {
        return $this->attr('target', $target instanceof Target ? $target->value : $target);
    }

    /**
     * Indicates whether input elements can by default have their values automatically completed by the browser.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#autocomplete
     */
    public function autocomplete(bool $value = true): static
    {
        return $this->attr('autocomplete', $value ? 'on' : 'off');
    }

    /**
     * Space-separated character encodings the server accepts.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#accept-charset
     */
    public function acceptCharset(string $value): static
    {
        return $this->attr('accept-charset', $value);
    }

    /**
     * Specifies the relationship between the current document and the form's action URL.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#rel
     */
    public function rel(Rel|string $rel): static
    {
        return $this->attr('rel', $rel instanceof Rel ? $rel->value : $rel);
    }
}
