<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use InvalidArgumentException;

/**
 * The HTML <td> element defines a cell of a table that contains data.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td
 */
final class Td extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('td');
    }

    /**
     * Sets the number of columns a cell should span.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td#colspan
     * @throws InvalidArgumentException If colspan is less than 1.
     */
    public function colspan(int $colspan): static
    {
        if ($colspan <= 0) {
            throw new InvalidArgumentException('colspan has to be at least 1');
        }

        return $this->attr('colspan', strval($colspan), escapeKey: false);
    }

    /**
     * Sets the number of rows a cell should span.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td#rowspan
     * @throws InvalidArgumentException If rowspan is less than 1.
     */
    public function rowspan(int $rowspan): static
    {
        if ($rowspan <= 0) {
            throw new InvalidArgumentException('rowspan has to be at least 1');
        }

        return $this->attr('rowspan', strval($rowspan), escapeKey: false);
    }

    /**
     * Specifies one or more header cells a data cell is related to.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td#headers
     */
    public function headers(string $value): static
    {
        return $this->attr('headers', $value, escapeKey: false);
    }
}
