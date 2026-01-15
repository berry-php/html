<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <nav> element represents a section of a page whose purpose is to provide navigation links.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav
 */
class Nav extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('nav');
    }
}
