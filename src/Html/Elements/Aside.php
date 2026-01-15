<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <aside> element represents a portion of a document whose content is only indirectly related to the document's main content.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/aside
 */
class Aside extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('aside');
    }
}
