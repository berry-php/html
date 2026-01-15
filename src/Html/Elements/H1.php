<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <h1>–<h6> elements represent six levels of section headings. <h1> is the highest section level and <h6> is the lowest.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements
 */
class H1 extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('h1');
    }
}
