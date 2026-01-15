<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <tfoot> element defines a set of rows summarizing the columns of the table.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tfoot
 */
class TFoot extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('tfoot');
    }
}
