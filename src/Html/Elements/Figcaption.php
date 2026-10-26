<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The <figcaption> HTML element represents a caption or legend describing
 * the rest of the contents of its parent <figure> element, providing
 * the <figure> an accessible name.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption
 */
final class Figcaption extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('figcaption');
    }
}
