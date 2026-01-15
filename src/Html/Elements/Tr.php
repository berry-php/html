<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <tr> element defines a row of cells in a table.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tr
 */
class Tr extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('tr');
    }
}
