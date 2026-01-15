<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <pre> element represents preformatted text which is to be presented exactly as written in the HTML file.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre
 */
class Pre extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('pre');
    }
}
