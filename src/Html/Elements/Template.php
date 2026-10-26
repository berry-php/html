<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * Inert HTML content to instantiate with JavaScript or declarative shadow DOM.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/template
 */
final class Template extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('template');
    }

    public function shadowrootmode(string $value): static
    {
        return $this->attr('shadowrootmode', $value, escapeKey: false);
    }

    public function shadowrootdelegatesfocus(bool $value = true): static
    {
        return $value ? $this->flag('shadowrootdelegatesfocus') : $this;
    }
}
