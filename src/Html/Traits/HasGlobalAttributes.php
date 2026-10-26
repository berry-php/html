<?php

declare(strict_types=1);

namespace Berry\Html\Traits;

use Berry\Html\Enums\AutoCapitalize;
use Berry\Html\Enums\Direction;
use Berry\Html\Enums\InputMode;
use Berry\Escaper;
use Berry\Traits\HasAttributes;
use Stringable;

/**
 * Global HTML attributes that can be used on almost any element.
 * Based on: https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes
 */
trait HasGlobalAttributes
{
    use HasAttributes;
    use HasClassAttribute;
    use HasStyleAttribute;
    use HasAriaAttributes;

    /**
     * Unique identifier for the element, must be unique in the document.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id
     */
    public function id(string $id): static
    {
        return $this->attr('id', $id, escapeKey: false);
    }

    /**
     * Provides a hint for generating a keyboard shortcut for the current element.
     * Space-separated list of characters.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/accesskey
     */
    public function accesskey(string $value): static
    {
        return $this->attr('accesskey', $value, escapeKey: false);
    }

    /**
     * Specifies the language of the element's content (BCP 47 tag).
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang
     */
    public function lang(string $value): static
    {
        return $this->attr('lang', $value, escapeKey: false);
    }

    /**
     * Advisory information, usually shown as a tooltip.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/title
     */
    public function title(string $value): static
    {
        return $this->attr('title', $value, escapeKey: false);
    }

    /**
     * Makes the element draggable via the Drag and Drop API.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/draggable
     */
    public function draggable(bool $value = true): static
    {
        return $this->attr('draggable', $value ? 'true' : 'false', escapeKey: false);
    }

    /**
     * Enables or disables spell checking on the element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/spellcheck
     */
    public function spellcheck(bool $value = true): static
    {
        return $this->attr('spellcheck', $value ? 'true' : 'false', escapeKey: false);
    }

    /**
     * Automatically focus this element when the page or dialog loads.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/autofocus
     */
    public function autofocus(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('autofocus');
    }

    /**
     * Allows editing of the element's content by the user.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
     */
    public function contenteditable(bool|string $value = true): static
    {
        if (is_bool($value)) {
            return $this->attr('contenteditable', $value ? 'true' : 'false', escapeKey: false);
        }

        return $this->attr('contenteditable', $value, escapeKey: false);
    }

    /**
     * Provides an explicit tab order for the element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/tabindex
     */
    public function tabindex(int $value): static
    {
        return $this->attr('tabindex', (string) $value, escapeKey: false);
    }

    /**
     * Hides the element from the page.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/hidden
     */
    public function hidden(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('hidden');
    }

    /**
     * Sets automatic capitalization behavior for user input.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/autocapitalize
     */
    public function autocapitalize(AutoCapitalize|string $value): static
    {
        return $this->attr(
            'autocapitalize',
            $value instanceof AutoCapitalize ? $value->value : $value,
            escapeKey: false,
        );
    }

    /**
     * Specifies the text direction for the element's content.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
     */
    public function dir(Direction|string $value): static
    {
        return $this->attr('dir', $value instanceof Direction ? $value->value : $value, escapeKey: false);
    }

    /**
     * Provides a hint to the browser about what type of virtual keyboard configuration to use.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/inputmode
     */
    public function inputmode(InputMode|string $value): static
    {
        return $this->attr('inputmode', $value instanceof InputMode ? $value->value : $value, escapeKey: false);
    }

    /**
     * Defines what action label (or icon) to present for the enter key on virtual keyboards.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/enterkeyhint
     */
    public function enterkeyhint(string $value): static
    {
        return $this->attr('enterkeyhint', $value, escapeKey: false);
    }

    /**
     * Allows you to specify that a standard HTML element should behave like a registered custom built-in element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/is
     */
    public function is(string $value): static
    {
        return $this->attr('is', $value, escapeKey: false);
    }

    /**
     * A cryptographic nonce (number used once) which can be used by Content Security Policy to determine whether or not a given fetch will be allowed to proceed.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/nonce
     */
    public function nonce(string $value): static
    {
        return $this->attr('nonce', $value, escapeKey: false);
    }

    /**
     * Used to export "parts" of a shadow tree so that they can be styled from the outside.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/part
     */
    public function part(string $value): static
    {
        return $this->attr('part', $value, escapeKey: false);
    }

    /**
     * Assigns a slot in a shadow DOM shadow tree to an element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/slot
     */
    public function slot(string $value): static
    {
        return $this->attr('slot', $value, escapeKey: false);
    }

    /**
     * Used to add a property to an item in Microdata.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemprop
     */
    public function itemprop(string $value): static
    {
        return $this->attr('itemprop', $value, escapeKey: false);
    }

    /**
     * Used to create a new item in Microdata.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemscope
     */
    public function itemscope(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('itemscope');
    }

    /**
     * Used to specify the type of an item in Microdata.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemtype
     */
    public function itemtype(string $value): static
    {
        return $this->attr('itemtype', $value, escapeKey: false);
    }

    /**
     * Used to specify a unique identifier for an item in Microdata.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemid
     */
    public function itemid(string $value): static
    {
        return $this->attr('itemid', $value, escapeKey: false);
    }

    /**
     * Used to specify a list of other elements that provide additional properties for an item in Microdata.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemref
     */
    public function itemref(string $value): static
    {
        return $this->attr('itemref', $value, escapeKey: false);
    }

    /**
     * Custom data attributes (data-*).
     * @param string $key The suffix of the data attribute (e.g., 'id' becomes 'data-id')
     * @param Stringable|string|int|float|bool $value The value to assign
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/data-*
     */
    public function data(string $key, Stringable|string|int|float|bool $value): static
    {
        return $this->attr("data-{$key}", $value, escapeKey: false);
    }

    /**
     * @return array<string, string|true>
     */
    public function getAttributes(): array
    {
        /** @var array<string, string|true> $attributes */
        $attributes = $this->attributes ?? [];

        if ($this->classes) {
            $attributes['class'] = Escaper::escape($this->classString());
        }

        if ($this->styles) {
            $attributes['style'] = Escaper::escape($this->styleString());
        }

        return $attributes;
    }
}
