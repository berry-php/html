<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <meter> element represents either a scalar value within a known range or a fractional value.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter
 */
final class Meter extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('meter');
    }

    /**
     * The lower numeric bound of the measured range.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter#min
     */
    public function min(float $min): static
    {
        return $this->attr('min', (string) $min, escapeKey: false);
    }

    /**
     * The upper numeric bound of the measured range.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter#max
     */
    public function max(float $max): static
    {
        return $this->attr('max', (string) $max, escapeKey: false);
    }

    /**
     * The lower numeric bound of the high end of the measured range.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter#low
     */
    public function low(float $low): static
    {
        return $this->attr('low', (string) $low, escapeKey: false);
    }

    /**
     * The upper numeric bound of the high end of the measured range.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter#high
     */
    public function high(float $high): static
    {
        return $this->attr('high', (string) $high, escapeKey: false);
    }

    /**
     * The optimal numeric value.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter#optimum
     */
    public function optimum(float $optimum): static
    {
        return $this->attr('optimum', (string) $optimum, escapeKey: false);
    }

    /**
     * The current numeric value.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter#value
     */
    public function value(float $value): static
    {
        return $this->attr('value', (string) $value, escapeKey: false);
    }
}
