<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <ol> element represents an ordered list of items — typically rendered as a numbered list.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol
 */
class Ol extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('ol');
    }

    /**
     * Adds a new li element.
     * @param Element|(Closure(Li): Li)|null $config
     */
    public function li(Element|Closure|null $config = null): static
    {
        $li = new Li();

        if ($config instanceof Closure) {
            $config($li);
        } elseif ($config !== null) {
            $li->child($config);
        }

        return $this->child($li);
    }

    /**
     * This Boolean attribute specifies that the list's items are in reverse order.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol#reversed
     */
    public function reversed(bool $value = true): static
    {
        if (!$value) {
            return $this;
        }

        return $this->flag('reversed');
    }

    /**
     * An integer to start counting from for the list items.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol#start
     */
    public function start(int $value): static
    {
        return $this->attr('start', (string) $value);
    }

    /**
     * Sets the numbering type.
     * Values: 'a' for lowercase letters, 'A' for uppercase letters, 'i' for lowercase Roman numerals, 'I' for uppercase Roman numerals, '1' for numbers.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol#type
     */
    public function type(string $value): static
    {
        return $this->attr('type', $value);
    }
}
