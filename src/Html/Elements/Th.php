<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use InvalidArgumentException;

/**
 * The HTML <th> element defines a cell as header of a group of table cells.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th
 */
class Th extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('th');
    }

    /**
     * Sets the number of columns a cell should span.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th#colspan
     * @throws InvalidArgumentException If colspan is less than 1.
     */
    public function colspan(int $colspan): static
    {
        if ($colspan <= 0) {
            throw new InvalidArgumentException('colspan has to be at least 1');
        }

        return $this->attr('colspan', strval($colspan));
    }

    /**
     * Sets the number of rows a cell should span.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th#rowspan
     * @throws InvalidArgumentException If rowspan is less than 1.
     */
    public function rowspan(int $rowspan): static
    {
        if ($rowspan <= 0) {
            throw new InvalidArgumentException('rowspan has to be at least 1');
        }

        return $this->attr('rowspan', strval($rowspan));
    }

    /**
     * Specifies the search and indexing of the header cell.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th#headers
     */
    public function headers(string $value): static
    {
        return $this->attr('headers', $value);
    }

    /**
     * Specifies the scope of the header cell.
     * Values: 'row', 'col', 'rowgroup', 'colgroup'.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th#scope
     */
    public function scope(string $value): static
    {
        return $this->attr('scope', $value);
    }
}
