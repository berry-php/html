<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Target;
use Berry\Html\HtmlVoidTag;

/**
 * The HTML <base> element specifies the base URL to use for all relative URLs in a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base
 */
class Base extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('base');
    }

    /**
     * The base URL to be used throughout the document for relative URLs.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base#href
     */
    public function href(string $href): static
    {
        return $this->attr('href', $href);
    }

    /**
     * A keyword or author-defined name of the default browsing context to show the results of navigating to hyperlinks and form submissions for <form>s or <a>s without explicit target attributes.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base#target
     */
    public function target(Target|string $target): static
    {
        return $this->attr('target', $target instanceof Target ? $target->value : $target);
    }
}
