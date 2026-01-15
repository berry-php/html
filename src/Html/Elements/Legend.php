<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <legend> element represents a caption for the content of its parent <fieldset>.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/legend
 */
class Legend extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('legend');
    }
}