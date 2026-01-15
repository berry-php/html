<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlVoidTag;

/**
 * The HTML <meta> element represents metadata that cannot be represented by other HTML meta-related elements, like <base>, <link>, <script>, <style> or <title>.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta
 */
class Meta extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('meta');
    }

    /**
     * Declares the document's character encoding.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#charset
     */
    public function charset(string $value): static
    {
        return $this->attr('charset', $value);
    }

    /**
     * This attribute contains the value for the http-equiv or name attribute, depending on which is used.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#content
     */
    public function content(string $value): static
    {
        return $this->attr('content', $value);
    }

    /**
     * Defines a pragma directive.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#http-equiv
     */
    public function httpEquiv(string $value): static
    {
        return $this->attr('http-equiv', $value);
    }

    /**
     * The media that the metadata applies to.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#media
     */
    public function media(string $value): static
    {
        return $this->attr('media', $value);
    }

    /**
     * The name attribute specifies the name of the metadata.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#name
     */
    public function name(string $value): static
    {
        return $this->attr('name', $value);
    }
}
