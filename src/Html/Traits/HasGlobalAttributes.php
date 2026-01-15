<?php declare(strict_types=1);

namespace Berry\Html\Traits;

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
     */
    public function id(string $id): static
    {
        return $this->attr('id', $id);
    }

    /**
     * Provides a hint for generating a keyboard shortcut for the current element.
     * Space-separated list of characters.
     */
    public function accesskey(string $value): static
    {
        return $this->attr('accesskey', $value);
    }

    /**
     * Specifies the language of the element's content (BCP 47 tag).
     */
    public function lang(string $value): static
    {
        return $this->attr('lang', $value);
    }

    /**
     * Advisory information, usually shown as a tooltip.
     */
    public function title(string $value): static
    {
        return $this->attr('title', $value);
    }

    /**
     * Makes the element draggable via the Drag and Drop API.
     */
    public function draggable(): static
    {
        return $this->flag('draggable');
    }

    /**
     * Enables or disables spell checking on the element.
     */
    public function spellcheck(): static
    {
        return $this->flag('spellcheck');
    }

    /**
     * Automatically focus this element when the page or dialog loads.
     */
    public function autofocus(): static
    {
        return $this->flag('autofocus');
    }

    /**
     * Allows editing of the element's content by the user.
     */
    public function contenteditable(): static
    {
        return $this->flag('contenteditable');
    }

    /**
     * Provides an explicit tab order for the element.
     */
    public function tabindex(int $value): static
    {
        return $this->attr('tabindex', (string) $value);
    }

    /**
     * Hides the element from the page.
     */
    public function hidden(): static
    {
        return $this->flag('hidden');
    }

    /**
     * Sets automatic capitalization behavior for user input.
     */
    public function autocapitalize(string $value): static
    {
        return $this->attr('autocapitalize', $value);
    }

    /**
     * Custom data attributes (data-*).
     * @param string $key The suffix of the data attribute (e.g., 'id' becomes 'data-id')
     * @param Stringable|string|int|float|bool $value The value to assign
     */
    public function data(string $key, Stringable|string|int|float|bool $value): static
    {
        return $this->attr("data-{$key}", $value);
    }

    public function getAttributes(): array
    {
        $attributes = $this->attributes;

        if (count($this->classes) > 0) {
            $attributes['class'] = $this->classString();
        }

        if (count($this->styles) > 0) {
            $attributes['style'] = $this->styleString();
        }

        return $attributes;
    }
}
