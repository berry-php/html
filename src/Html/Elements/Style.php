<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <style> element contains style information for a document, or part of a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/style
 */
class Style extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('style');
    }

    /**
     * This attribute defines which media the style should be applied to.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/style#media
     */
    public function media(string $value): static
    {
        return $this->attr('media', $value);
    }
}
