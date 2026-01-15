<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\ReferrerPolicy;
use Berry\Html\Enums\Rel;
use Berry\Html\Enums\Target;
use Berry\Html\HtmlTag;

/**
 * The HTML <a> element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email addresses, locations in the same page, or anything else a URL can address.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
class A extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('a');
    }

    /**
     * The URL that the hyperlink points to.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#href
     */
    public function href(string $href): static
    {
        return $this->attr('href', $href);
    }

    /**
     * Prompts the user to save the linked URL instead of navigating to it.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#download
     */
    public function download(string|bool $value = true): static
    {
        if (is_bool($value)) {
            return $value ? $this->flag('download') : $this;
        }

        return $this->attr('download', $value);
    }

    /**
     * Specifies the relationship between the current document and the linked resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#rel
     */
    public function rel(Rel|string $rel): static
    {
        return $this->attr('rel', $rel instanceof Rel ? $rel->value : $rel);
    }

    /**
     * Specifies where to display the linked resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#target
     */
    public function target(Target|string $target): static
    {
        return $this->attr('target', $target instanceof Target ? $target->value : $target);
    }

    /**
     * Hints at the linked resource's MIME type.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#type
     */
    public function type(string $value): static
    {
        return $this->attr('type', $value);
    }

    /**
     * Indicates the language of the linked resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#hreflang
     */
    public function hreflang(string $value): static
    {
        return $this->attr('hreflang', $value);
    }

    /**
     * A space-separated list of URLs to which, when the hyperlink is followed, POST requests with the body PING will be sent by the browser (in the background). Typically used for tracking.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#ping
     */
    public function ping(string $value): static
    {
        return $this->attr('ping', $value);
    }

    /**
     * Specifies which referrer to send when fetching the resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#referrerpolicy
     */
    public function referrerpolicy(ReferrerPolicy|string $value): static
    {
        return $this->attr('referrerpolicy', $value instanceof ReferrerPolicy ? $value->value : $value);
    }
}
