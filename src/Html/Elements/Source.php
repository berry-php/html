<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlVoidTag;

/**
 * A media source for picture, audio or video.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/source
 */
final class Source extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('source');
    }

    public function src(string $value): static
    {
        return $this->attr('src', $value, escapeKey: false);
    }

    public function type(string $value): static
    {
        return $this->attr('type', $value, escapeKey: false);
    }

    public function srcset(string $value): static
    {
        return $this->attr('srcset', $value, escapeKey: false);
    }

    public function sizes(string $value): static
    {
        return $this->attr('sizes', $value, escapeKey: false);
    }

    public function media(string $value): static
    {
        return $this->attr('media', $value, escapeKey: false);
    }

    public function width(int|string $value): static
    {
        return $this->attr('width', $value, escapeKey: false);
    }

    public function height(int|string $value): static
    {
        return $this->attr('height', $value, escapeKey: false);
    }
}
