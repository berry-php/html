<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <tbody> element encapsulates a set of table rows (<tr> elements), indicating that they comprise the body of the table (<table>).
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tbody
 */
class TBody extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('tbody');
    }
}
