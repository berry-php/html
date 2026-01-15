<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <head> element contains machine-readable information (metadata) about the document, like its title, scripts, and style sheets.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head
 */
class Head extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('head');
    }
}
