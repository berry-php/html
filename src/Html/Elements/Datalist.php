<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

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
     * The id attribute of the <datalist> element must be the same as the list attribute of the <input> element.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist#id
     */
    public function id(string $id): static
    {
        return $this->attr('id', $id);
    }
}