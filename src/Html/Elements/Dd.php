<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <dd> element provides the description, definition, or value for the preceding term (<dt>) in a description list (<dl>).
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dd
 */
class Dd extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('dd');
    }
}