<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Loading;
use Berry\Html\Enums\ReferrerPolicy;
use Berry\Html\HtmlTag;

/**
 * The HTML <iframe> element represents a nested browsing context, embedding another HTML page into the current one.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe
 */
class Iframe extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('iframe');
    }

    /**
     * The URL of the page to embed.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#src
     */
    public function src(string $src): static
    {
        return $this->attr('src', $src);
    }

    /**
     * Indicates when the browser should load the iframe.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#loading
     */
    public function loading(Loading|string $loading): static
    {
        return $this->attr('loading', $loading instanceof Loading ? $loading->value : $loading);
    }

    /**
     * A Content Security Policy enforced for the embedded resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#csp
     */
    public function csp(string $csp): static
    {
        return $this->attr('csp', $csp);
    }

    /**
     * The height of the frame in CSS pixels.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#height
     */
    public function height(int|string $height): static
    {
        return $this->attr('height', (string) $height);
    }

    /**
     * The width of the frame in CSS pixels.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#width
     */
    public function width(int|string $width): static
    {
        return $this->attr('width', (string) $width);
    }

    /**
     * The name of the embedded browsing context.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#name
     */
    public function name(string $name): static
    {
        return $this->attr('name', $name);
    }

    /**
     * Indicates which referrer to send when fetching the frame's resource.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#referrerpolicy
     */
    public function referrerpolicy(ReferrerPolicy|string $referrerpolicy): static
    {
        return $this->attr('referrerpolicy', $referrerpolicy instanceof ReferrerPolicy ? $referrerpolicy->value : $referrerpolicy);
    }

    /**
     * Applies extra restrictions to the content in the frame.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#sandbox
     */
    public function sandbox(string $sandbox): static
    {
        return $this->attr('sandbox', $sandbox);
    }

    /**
     * The URL of a document to embed in the iframe.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#srcdoc
     */
    public function srcdoc(string $srcdoc): static
    {
        return $this->attr('srcdoc', $srcdoc);
    }
}