<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <div> element is the generic container for flow content. It has no effect on the content or layout until styled in some way using CSS.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div
 */
class Div extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('div');
    }
}
