<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * Responsive image sources followed by a fallback img element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/picture
 */
final class Picture extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('picture');
    }
}
