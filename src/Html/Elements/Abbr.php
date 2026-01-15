<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <abbr> element represents an abbreviation or acronym.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr
 */
class Abbr extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('abbr');
    }

    /**
     * Provides an expansion or definition for the abbreviation.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr#title
     */
    public function title(string $title): static
    {
        return $this->attr('title', $title);
    }
}