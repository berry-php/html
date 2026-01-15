<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <canvas> element is used to draw graphics, on the fly, via JavaScript.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas
 */
class Canvas extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('canvas');
    }

    /**
     * The height of the coordinate space in CSS pixels.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas#height
     */
    public function height(int $height): static
    {
        return $this->attr('height', (string) $height);
    }

    /**
     * The width of the coordinate space in CSS pixels.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas#width
     */
    public function width(int $width): static
    {
        return $this->attr('width', (string) $width);
    }
}