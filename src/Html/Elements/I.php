<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <i> element represents a range of text that is set off from the normal text for some reason, such as idiomatic text, technical terms, taxonomic designations, among others.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/i
 */
class I extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('i');
    }
}
