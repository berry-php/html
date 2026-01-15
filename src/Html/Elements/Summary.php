<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <summary> element specifies a summary, caption, or legend for a <details> element's disclosure box.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/summary
 */
class Summary extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('summary');
    }
}
