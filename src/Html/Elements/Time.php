<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <time> element represents a specific period in time.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time
 */
class Time extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('time');
    }

    /**
     * This attribute indicates the time and/or date of the element and must be in one of the formats described below.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time#datetime
     */
    public function datetime(string $datetime): static
    {
        return $this->attr('datetime', $datetime);
    }
}