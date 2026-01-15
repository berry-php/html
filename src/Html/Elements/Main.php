<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <main> element represents the dominant content of the <body> of a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/main
 */
class Main extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('main');
    }
}
