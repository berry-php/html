<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <sup> element specifies inline text which is to be displayed as superscript for solely typographical reasons.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/sup
 */
class Sup extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('sup');
    }
}