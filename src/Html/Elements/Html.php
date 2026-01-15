<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Rendering\Renderer;

/**
 * The HTML <html> element represents the root (top-level element) of an HTML document, so it is also referred to as the root element. All other elements must be descendants of this element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html
 */
class Html extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('html');
    }

    public function render(Renderer $renderer): void
    {
        $renderer->write('<!DOCTYPE html>');
        parent::render($renderer);
    }

    /**
     * Specifies the language of the element's content.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html#lang
     */
    public function lang(string $lang): static
    {
        return $this->attr('lang', $lang);
    }

    /**
     * Specifies the XML Namespace of the document.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html#xmlns
     */
    public function xmlns(string $value): static
    {
        return $this->attr('xmlns', $value);
    }
}
