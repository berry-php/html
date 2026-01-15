<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <li> element is used to represent an item in a list.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/li
 */
class Li extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('li');
    }
}
