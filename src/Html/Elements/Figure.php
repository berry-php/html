<?php

declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Element;
use Berry\Html\HtmlTag;
use Closure;

/**
 * The <figure> HTML element represents self-contained content, potentially with an
 * optional caption, which is specified using the <figcaption> element. The figure,
 * its caption, and its contents are referenced as a single unit.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure
 */
final class Figure extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('figure');
    }

    /**
     * Adds a new figcaption element.
     * @param Element|(Closure(Figcaption): Figcaption)|null $config
     */
    public function figcaption(Element|Closure|null $config = null): static
    {
        $figcaption = new Figcaption();

        if ($config instanceof Closure) {
            $config($figcaption);
        } elseif ($config !== null) {
            $figcaption->child($config);
        }

        return $this->child($figcaption);
    }
}
