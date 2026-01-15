<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <code> element displays its contents styled in a fashion intended to indicate that the text is a short fragment of computer code.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/code
 */
class Code extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('code');
    }
}
