<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\ReferrerPolicy;
use Berry\Html\HtmlTag;

/**
 * The HTML <script> element is used to embed executable code or data; this is typically used to embed or refer to JavaScript code.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
class Script extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('script');
    }

    /**
     * The URL of an external script.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#src
     */
    public function src(string $src): static
    {
        return $this->attr('src', $src);
    }

    /**
     * For classic scripts, if the async attribute is present, then the classic script will be fetched in parallel to parsing and evaluated as soon as it is available.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#async
     */
    public function async(bool $async = true): static
    {
        if (!$async) {
            return $this;
        }

        return $this->flag('async');
    }

    /**
     * This Boolean attribute is set to indicate to a browser that the script is meant to be executed after the document has been parsed, but before firing DOMContentLoaded.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#defer
     */
    public function defer(bool $defer = true): static
    {
        if (!$defer) {
            return $this;
        }

        return $this->flag('defer');
    }

    /**
     * Indicates if the element should be fetched by way of a CORS request.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#crossorigin
     */
    public function crossorigin(Crossorigin|string $value): static
    {
        return $this->attr('crossorigin', $value instanceof Crossorigin ? $value->value : $value);
    }

    /**
     * Contains inline metadata that a user agent can use to verify that a fetched resource has been delivered without unexpected manipulation.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#integrity
     */
    public function integrity(string $value): static
    {
        return $this->attr('integrity', $value);
    }

    /**
     * This Boolean attribute is set to indicate that the script should not be executed in browsers that support ES modules.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#nomodule
     */
    public function nomodule(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('nomodule');
    }

    /**
     * Specifies which referrer to use when fetching the script.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#referrerpolicy
     */
    public function referrerpolicy(ReferrerPolicy|string $value): static
    {
        return $this->attr('referrerpolicy', $value instanceof ReferrerPolicy ? $value->value : $value);
    }

    /**
     * This attribute indicates the type of script represented.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#type
     */
    public function type(string $value): static
    {
        return $this->attr('type', $value);
    }

    /**
     * Provides a hint of the relative priority to use when fetching an external script.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#fetchpriority
     */
    public function fetchpriority(string $value): static
    {
        return $this->attr('fetchpriority', $value);
    }
}
