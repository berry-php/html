<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <mark> element represents text which is marked or highlighted for reference or notation purposes.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/mark
 */
class Mark extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('mark');
    }
}