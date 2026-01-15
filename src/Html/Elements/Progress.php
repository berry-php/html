<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <progress> element displays an indicator showing the completion progress of a task, typically displayed as a progress bar.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/progress
 */
class Progress extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('progress');
    }

    /**
     * This attribute describes how much work the task indicated by the progress element requires.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/progress#max
     */
    public function max(float $max): static
    {
        return $this->attr('max', (string) $max);
    }

    /**
     * This attribute specifies how much of the task that has been completed.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/progress#value
     */
    public function value(float $value): static
    {
        return $this->attr('value', (string) $value);
    }
}