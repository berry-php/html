<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <table> element represents tabular data — that is, information presented in a two-dimensional table comprised of rows and columns of cells containing data.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/table
 */
class Table extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('table');
    }
}
