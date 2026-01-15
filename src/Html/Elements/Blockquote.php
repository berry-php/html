<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <blockquote> element indicates that the enclosed text is an extended quotation. Usually, this is rendered visually by indentation.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote
 */
class Blockquote extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('blockquote');
    }

    /**
     * A URL that designates a source document or message for the information quoted.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote#cite
     */
    public function cite(string $cite): static
    {
        return $this->attr('cite', $cite);
    }
}