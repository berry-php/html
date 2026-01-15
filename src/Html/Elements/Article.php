<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <article> element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article
 */
class Article extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('article');
    }
}
