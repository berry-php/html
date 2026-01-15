<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <dt> element specifies a term in a description or definition list, and as such must be used inside a <dl> element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dt
 */
class Dt extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('dt');
    }
}