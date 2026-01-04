<?php declare(strict_types=1);

namespace Berry\Html5\Traits;

use Berry\Html5\Enums\AriaRole;

/**
 * ARIA (Accessible Rich Internet Applications) attributes.
 * Based on: https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes
 */
trait HasAriaAttributes
{
    /**
     * Defines the hierarchical role of an element.
     */
    public function role(AriaRole|string $role): static
    {
        return $this->attr('role', $role instanceof AriaRole ? $role->value : $role);
    }

    /**
     * Indicates whether the element is exposed to an accessibility API.
     */
    public function ariaHidden(bool $value = true): static
    {
        return $this->attr('aria-hidden', $value ? 'true' : 'false');
    }

    /**
     * Defines a string value that labels the current element.
     */
    public function ariaLabel(string $value): static
    {
        return $this->attr('aria-label', $value);
    }

    /**
     * Identifies the element (or elements) that labels the current element.
     */
    public function ariaLabelledBy(string $id): static
    {
        return $this->attr('aria-labelledby', $id);
    }

    /**
     * Identifies the element (or elements) that describes the object.
     */
    public function ariaDescribedby(string $id): static
    {
        return $this->attr('aria-describedby', $id);
    }

    /**
     * Defines the current "checked" state of checkboxes, radio buttons, and other widgets.
     * Supported: true, false, 'mixed'
     */
    public function ariaChecked(bool|string $value): static
    {
        return $this->attr('aria-checked', is_bool($value) ? ($value ? 'true' : 'false') : $value);
    }

    /**
     * Indicates whether the element, or another grouping element it controls, is currently expanded or collapsed.
     */
    public function ariaExpanded(bool $value = true): static
    {
        return $this->attr('aria-expanded', $value ? 'true' : 'false');
    }

    /**
     * Indicates that the element is perceivable but disabled, so it is not editable or otherwise operable.
     */
    public function ariaDisabled(bool $value = true): static
    {
        return $this->attr('aria-disabled', $value ? 'true' : 'false');
    }

    /**
     * Indicates whether an element is "pressed", "not pressed", or "mixed" (for toggle buttons).
     */
    public function ariaPressed(bool|string $value): static
    {
        return $this->attr('aria-pressed', is_bool($value) ? ($value ? 'true' : 'false') : $value);
    }

    /**
     * Indicates the current "selected" state of various widgets.
     */
    public function ariaSelected(bool $value = true): static
    {
        return $this->attr('aria-selected', $value ? 'true' : 'false');
    }

    /**
     * Identifies the element (or elements) whose contents or presence are controlled by the current element.
     */
    public function ariaControls(string $id): static
    {
        return $this->attr('aria-controls', $id);
    }

    /**
     * Identifies the element (or elements) that describes the primary content of the element.
     */
    public function ariaDetails(string $id): static
    {
        return $this->attr('aria-details', $id);
    }

    /**
     * Identifies the element (or elements) that provides an error message for the object.
     */
    public function ariaErrorMessage(string $id): static
    {
        return $this->attr('aria-errormessage', $id);
    }

    /**
     * Identifies the element (or elements) that is/are the next element(s) in an alternate reading order.
     */
    public function ariaFlowTo(string $id): static
    {
        return $this->attr('aria-flowto', $id);
    }

    /**
     * Identifies the element (or elements) that the current element owns.
     */
    public function ariaOwns(string $id): static
    {
        return $this->attr('aria-owns', $id);
    }

    /**
     * Defines an element's number or total number of items in a list, grid, or treegrid.
     */
    public function ariaPosInSet(int $value): static
    {
        return $this->attr('aria-posinset', (string) $value);
    }

    /**
     * Defines the number of items in the current set of listitems or treeitems.
     */
    public function ariaSetSize(int $value): static
    {
        return $this->attr('aria-setsize', (string) $value);
    }

    /**
     * Indicates that an element will be updated, and describes the types of updates the user agents,
     * assistive technologies, and user can expect from the live region.
     * Values: 'off', 'polite', 'assertive'
     */
    public function ariaLive(string $value = 'polite'): static
    {
        return $this->attr('aria-live', $value);
    }

    /**
     * Indicates whether assistive technologies should announce all, or only parts of, the changed region.
     */
    public function ariaAtomic(bool $value = true): static
    {
        return $this->attr('aria-atomic', $value ? 'true' : 'false');
    }

    /**
     * Indicates what user agent notifications should occur when the HTML list or relevant sub-tree is modified.
     * Values: 'additions', 'removals', 'text', 'all' (space-separated)
     */
    public function ariaRelevant(string $value): static
    {
        return $this->attr('aria-relevant', $value);
    }

    /**
     * Indicates that an element is being modified and that assistive technologies MAY want to wait
     * until the modifications are complete before exposing them to the user.
     */
    public function ariaBusy(bool $value = true): static
    {
        return $this->attr('aria-busy', $value ? 'true' : 'false');
    }

    /**
     * Indicates whether inputting text could trigger display of one or more predictions of the user's intended value.
     */
    public function ariaAutocomplete(string $value): static
    {
        return $this->attr('aria-autocomplete', $value);
    }

    /**
     * Indicates that the element may be "invalid" (contains errors).
     */
    public function ariaInvalid(bool|string $value = true): static
    {
        return $this->attr('aria-invalid', is_bool($value) ? ($value ? 'true' : 'false') : $value);
    }

    /**
     * Indicates that user input is required on the element before a form may be submitted.
     */
    public function ariaRequired(bool $value = true): static
    {
        return $this->attr('aria-required', $value ? 'true' : 'false');
    }

    /**
     * Defines the current value for a range widget (e.g., slider, progressbar).
     */
    public function ariaValueNow(float|int $value): static
    {
        return $this->attr('aria-valuenow', (string) $value);
    }

    /**
     * Defines the maximum allowed value for a range widget.
     */
    public function ariaValueMax(float|int $value): static
    {
        return $this->attr('aria-valuemax', (string) $value);
    }

    /**
     * Defines the minimum allowed value for a range widget.
     */
    public function ariaValueMin(float|int $value): static
    {
        return $this->attr('aria-valuemin', (string) $value);
    }

    /**
     * Defines the human-readable text alternative of aria-valuenow for a range widget.
     */
    public function ariaValueText(string $value): static
    {
        return $this->attr('aria-valuetext', $value);
    }
}
