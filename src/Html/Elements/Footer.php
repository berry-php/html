<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <footer> element represents a footer for its nearest ancestor sectioning content or sectioning root element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/footer
 */
class Footer extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('footer');
    }
}
