<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <body> element represents the content of an HTML document. There can be only one <body> element in a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/body
 */
class Body extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('body');
    }
}
