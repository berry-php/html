<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <span> element is a generic inline container for phrasing content, which does not inherently represent anything.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span
 */
class Span extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('span');
    }
}
