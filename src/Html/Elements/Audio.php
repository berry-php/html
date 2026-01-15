<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\Preload;
use Berry\Html\HtmlTag;

/**
 * The HTML <audio> element is used to embed sound content in documents.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio
 */
class Audio extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('audio');
    }

    /**
     * The URL of the audio to embed.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#src
     */
    public function src(string $src): static
    {
        return $this->attr('src', $src);
    }

    /**
     * Indicates whether to start playing the audio automatically.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#autoplay
     */
    public function autoplay(bool $autoplay = true): static
    {
        return $autoplay ? $this->flag('autoplay') : $this;
    }

    /**
     * If this attribute is present, the browser will offer controls to allow the user to control audio playback.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#controls
     */
    public function controls(bool $controls = true): static
    {
        return $controls ? $this->flag('controls') : $this;
    }

    /**
     * Indicates whether the audio should start over again when finished.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#loop
     */
    public function loop(bool $loop = true): static
    {
        return $loop ? $this->flag('loop') : $this;
    }

    /**
     * Indicates whether the audio will be initially silenced.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#muted
     */
    public function muted(bool $muted = true): static
    {
        return $muted ? $this->flag('muted') : $this;
    }

    /**
     * Provides a hint to the browser about what the author thinks will lead to the best user experience.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#preload
     */
    public function preload(Preload|string $preload): static
    {
        return $this->attr('preload', $preload instanceof Preload ? $preload->value : $preload);
    }

    /**
     * Indicates whether CORS must be used when fetching the resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#crossorigin
     */
    public function crossorigin(Crossorigin|string $crossorigin): static
    {
        return $this->attr('crossorigin', $crossorigin instanceof Crossorigin ? $crossorigin->value : $crossorigin);
    }
}