<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use InvalidArgumentException;

class Td extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('td');
    }

    /**
     * Sets the number of columns a cell should span.
     *
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
     *
     * @throws InvalidArgumentException If rowspan is less than 1.
     */
    public function rowspan(int $rowspan): static
    {
        if ($rowspan <= 0) {
            throw new InvalidArgumentException('rowspan has to be at least 1');
        }

        return $this->attr('rowspan', strval($rowspan));
    }
}
