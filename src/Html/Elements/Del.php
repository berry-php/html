<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <del> element represents a range of text that has been deleted from a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/del
 */
class Del extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('del');
    }

    /**
     * A URI for a resource that explains the change (for example, meeting minutes).
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/del#cite
     */
    public function cite(string $cite): static
    {
        return $this->attr('cite', $cite);
    }

    /**
     * This attribute indicates the time and date of the change and must be a valid date string with an optional time.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/del#datetime
     */
    public function datetime(string $datetime): static
    {
        return $this->attr('datetime', $datetime);
    }
}