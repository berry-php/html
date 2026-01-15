<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <em> element marks text that has stress emphasis. The <em> element can be nested, with each level of nesting indicating a greater degree of emphasis.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/em
 */
class Em extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('em');
    }
}