<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\ReferrerPolicy;
use Berry\Html\Enums\Rel;
use Berry\Html\HtmlVoidTag;

/**
 * The HTML <link> element specifies relationships between the current document and an external resource.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
class Link extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('link');
    }

    /**
     * The URL of the linked resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#href
     */
    public function href(string $href): static
    {
        return $this->attr('href', $href);
    }

    /**
     * Specifies the relationship between the current document and the linked resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#rel
     */
    public function rel(Rel|string $rel): static
    {
        return $this->attr('rel', $rel instanceof Rel ? $rel->value : $rel);
    }

    /**
     * This attribute is only used when rel="preload" or rel="prefetch" is set. It specifies the type of content being loaded.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#as
     */
    public function as(string $value): static
    {
        return $this->attr('as', $value);
    }

    /**
     * Indicates if the element should be fetched by way of a CORS request.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#crossorigin
     */
    public function crossorigin(Crossorigin|string $value): static
    {
        return $this->attr('crossorigin', $value instanceof Crossorigin ? $value->value : $value);
    }

    /**
     * Indicates that the link is disabled.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#disabled
     */
    public function disabled(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('disabled');
    }

    /**
     * Indicates the language of the linked resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#hreflang
     */
    public function hreflang(string $value): static
    {
        return $this->attr('hreflang', $value);
    }

    /**
     * Applicable when rel="preload" and as="image". Sizes of the image to preload.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#imagesizes
     */
    public function imagesizes(string $value): static
    {
        return $this->attr('imagesizes', $value);
    }

    /**
     * Applicable when rel="preload" and as="image". Srcset of the image to preload.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#imagesrcset
     */
    public function imagesrcset(string $value): static
    {
        return $this->attr('imagesrcset', $value);
    }

    /**
     * Contains inline metadata that a user agent can use to verify that a fetched resource has been delivered without unexpected manipulation.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#integrity
     */
    public function integrity(string $value): static
    {
        return $this->attr('integrity', $value);
    }

    /**
     * Specifies the media that the linked resource applies to.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#media
     */
    public function media(string $value): static
    {
        return $this->attr('media', $value);
    }

    /**
     * Specifies which referrer to use when fetching the resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#referrerpolicy
     */
    public function referrerpolicy(ReferrerPolicy|string $value): static
    {
        return $this->attr('referrerpolicy', $value instanceof ReferrerPolicy ? $value->value : $value);
    }

    /**
     * Sizes of the icons for visual media.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#sizes
     */
    public function sizes(string $value): static
    {
        return $this->attr('sizes', $value);
    }

    /**
     * Hints at the linked resource's MIME type.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#type
     */
    public function type(string $value): static
    {
        return $this->attr('type', $value);
    }

    /**
     * Provides a hint of the relative priority to use when fetching a resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#fetchpriority
     */
    public function fetchpriority(string $value): static
    {
        return $this->attr('fetchpriority', $value);
    }
}
