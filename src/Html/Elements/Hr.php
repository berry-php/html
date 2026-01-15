<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlVoidTag;

/**
 * The HTML <hr> element represents a thematic break between paragraph-level elements.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/hr
 */
class Hr extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('hr');
    }
}
