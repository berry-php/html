<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <ul> element represents an unordered list of items.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul
 */
class Ul extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('ul');
    }
}
