<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\Decoding;
use Berry\Html\Enums\Loading;
use Berry\Html\Enums\ReferrerPolicy;
use Berry\Html\HtmlVoidTag;

/**
 * The HTML <img> element embeds an image into the document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img
 */
class Img extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('img');
    }

    /**
     * The image URL.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#src
     */
    public function src(string $src): static
    {
        return $this->attr('src', $src);
    }

    /**
     * Defines an alternative text description of the image.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#alt
     */
    public function alt(string $alt): static
    {
        return $this->attr('alt', $alt);
    }

    /**
     * The intrinsic width of the image in pixels.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#width
     */
    public function width(int|string $width): static
    {
        return $this->attr('width', (string) $width);
    }

    /**
     * The intrinsic height of the image in pixels.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#height
     */
    public function height(int|string $height): static
    {
        return $this->attr('height', (string) $height);
    }

    /**
     * One or more strings separated by commas, indicating a set of possible image sources for the user agent to use.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#srcset
     */
    public function srcset(string $value): static
    {
        return $this->attr('srcset', $value);
    }

    /**
     * One or more strings separated by commas, indicating a set of source sizes.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#sizes
     */
    public function sizes(string $value): static
    {
        return $this->attr('sizes', $value);
    }

    /**
     * Indicates if the element should be fetched by way of a CORS request.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#crossorigin
     */
    public function crossorigin(Crossorigin|string $value): static
    {
        return $this->attr('crossorigin', $value instanceof Crossorigin ? $value->value : $value);
    }

    /**
     * Provides a hint to the browser as to how it should decode the image.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#decoding
     */
    public function decoding(Decoding|string $value): static
    {
        return $this->attr('decoding', $value instanceof Decoding ? $value->value : $value);
    }

    /**
     * Indicates how the browser should load the image.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#loading
     */
    public function loading(Loading|string $value): static
    {
        return $this->attr('loading', $value instanceof Loading ? $value->value : $value);
    }

    /**
     * Specifies which referrer to use when fetching the resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#referrerpolicy
     */
    public function referrerpolicy(ReferrerPolicy|string $value): static
    {
        return $this->attr('referrerpolicy', $value instanceof ReferrerPolicy ? $value->value : $value);
    }

    /**
     * The partial URL (starting with #) of an image map associated with the element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#usemap
     */
    public function usemap(string $value): static
    {
        return $this->attr('usemap', $value);
    }

    /**
     * The ismap attribute is a Boolean attribute indicating that the image is part of a server-side map.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#ismap
     */
    public function ismap(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('ismap');
    }
}
