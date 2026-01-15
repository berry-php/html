<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <title> element defines the document's title that is shown in a browser's title bar or a page's tab.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/title
 */
class Title extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('title');
    }
}
