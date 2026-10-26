<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\TrackKind;
use Berry\Html\HtmlVoidTag;

/**
 * Timed text tracks for audio and video.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/track
 */
final class Track extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('track');
    }

    public function src(string $value): static
    {
        return $this->attr('src', $value, escapeKey: false);
    }

    public function kind(TrackKind|string $value): static
    {
        return $this->attr('kind', $value instanceof TrackKind ? $value->value : $value, escapeKey: false);
    }

    public function srclang(string $value): static
    {
        return $this->attr('srclang', $value, escapeKey: false);
    }

    public function label(string $value): static
    {
        return $this->attr('label', $value, escapeKey: false);
    }

    public function default(bool $value = true): static
    {
        return $value ? $this->flag('default') : $this;
    }
}
