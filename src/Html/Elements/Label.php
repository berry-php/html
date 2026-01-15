<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <label> element represents a caption for an item in a user interface.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/label
 */
class Label extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('label');
    }

    /**
     * The id of a labelable form-related element in the same document as the <label> element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/label#for
     */
    public function for(string $value): static
    {
        return $this->attr('for', $value);
    }
}
