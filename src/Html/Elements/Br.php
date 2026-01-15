<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlVoidTag;

/**
 * The HTML <br> element represents a line break. It is a void element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/br
 */
class Br extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('br');
    }
}
