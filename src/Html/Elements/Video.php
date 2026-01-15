<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\Preload;
use Berry\Html\HtmlTag;

/**
 * The HTML <video> element embeds a media player which supports video playback into the document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video
 */
class Video extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('video');
    }

    /**
     * The URL of the video to embed.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#src
     */
    public function src(string $src): static
    {
        return $this->attr('src', $src);
    }

    /**
     * Indicates whether to start playing the video automatically.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#autoplay
     */
    public function autoplay(bool $autoplay = true): static
    {
        return $autoplay ? $this->flag('autoplay') : $this;
    }

    /**
     * If this attribute is present, the browser will offer controls to allow the user to control video playback.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#controls
     */
    public function controls(bool $controls = true): static
    {
        return $controls ? $this->flag('controls') : $this;
    }

    /**
     * The height of the video's display area.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#height
     */
    public function height(int $height): static
    {
        return $this->attr('height', (string) $height);
    }

    /**
     * The width of the video's display area.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#width
     */
    public function width(int $width): static
    {
        return $this->attr('width', (string) $width);
    }

    /**
     * Indicates whether the video should start over again when finished.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#loop
     */
    public function loop(bool $loop = true): static
    {
        return $loop ? $this->flag('loop') : $this;
    }

    /**
     * Indicates whether the video will be initially silenced.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#muted
     */
    public function muted(bool $muted = true): static
    {
        return $muted ? $this->flag('muted') : $this;
    }

    /**
     * A URL indicating a poster frame to show until the user plays or seeks.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#poster
     */
    public function poster(string $poster): static
    {
        return $this->attr('poster', $poster);
    }

    /**
     * Provides a hint to the browser about what the author thinks will lead to the best user experience.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#preload
     */
    public function preload(Preload|string $preload): static
    {
        return $this->attr('preload', $preload instanceof Preload ? $preload->value : $preload);
    }

    /**
     * Indicates whether CORS must be used when fetching the resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video#crossorigin
     */
    public function crossorigin(Crossorigin|string $crossorigin): static
    {
        return $this->attr('crossorigin', $crossorigin instanceof Crossorigin ? $crossorigin->value : $crossorigin);
    }
}