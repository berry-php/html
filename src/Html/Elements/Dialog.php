<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

/**
 * The HTML <dialog> element represents a dialog box or other interactive component, such as a dismissible alert, inspector, or subwindow.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dialog
 */
class Dialog extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('dialog');
    }

    /**
     * Indicates that the dialog is active and can be interacted with.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dialog#open
     */
    public function open(bool $open = true): static
    {
        if (!$open) {
            return $this;
        }

        return $this->flag('open');
    }
}
