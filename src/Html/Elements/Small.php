<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <small> element represents side-comments and small print, like copyright and legal text, independent of its styled presentation.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/small
 */
class Small extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('small');
    }
}
