<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <dl> element represents a description list. The element encloses a list of groups of terms (specified using the <dt> element) and descriptions (provided by <dd> elements).
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dl
 */
class Dl extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('dl');
    }
}