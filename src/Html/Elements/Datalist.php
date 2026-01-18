<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Closure;

/**
 * The HTML <datalist> element contains a set of <option> elements that represent the permissible or recommended options available to choose from within other controls.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist
 */
class Datalist extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('datalist');
    }

    /**
     * Adds a new option element.
     * @param string|null $value
     * @param string|null $text
     */
    public function option(?string $value = null, ?string $text = null): static
    {
        $option = new Option();

        if ($value !== null) {
            $option->value($value);
        }

        if ($text !== null) {
            $option->text($text);
        }

        return $this->child($option);
    }

    /**
     * The id attribute of the <datalist> element must be the same as the list attribute of the <input> element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist#id
     */
    public function id(string $id): static
    {
        return $this->attr('id', $id);
    }
}