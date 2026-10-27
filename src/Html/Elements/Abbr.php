<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Override;

/**
 * The HTML <abbr> element represents an abbreviation or acronym.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr
 */
final class Abbr extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('abbr');
    }

    /**
     * Provides an expansion or definition for the abbreviation.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr#title
     */
    #[Override]
    public function title(string $value): static
    {
        return $this->attr('title', $value, escapeKey: false);
    }
}
