<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <sub> element specifies inline text which should be displayed as subscript for solely typographical reasons.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/sub
 */
class Sub extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('sub');
    }
}