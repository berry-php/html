<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <section> element represents a generic standalone section of a document, which doesn't have a more specific semantic element to represent it.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/section
 */
class Section extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('section');
    }
}
