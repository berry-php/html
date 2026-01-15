<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <header> element represents introductory content, typically a group of introductory or navigational aids.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/header
 */
class Header extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('header');
    }
}
