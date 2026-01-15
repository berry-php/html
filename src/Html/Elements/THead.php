<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <thead> element defines a set of rows defining the head of the columns of the table.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/thead
 */
class THead extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('thead');
    }
}
