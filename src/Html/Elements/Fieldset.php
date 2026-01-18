<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <fieldset> element is used to group several controls as well as labels (<label>) within a web form.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/fieldset
 */
class Fieldset extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('fieldset');
    }

    /**
     * Adds a new legend element.
     * @param Element|(Closure(Legend): Legend)|null $config
     */
    public function legend(Element|Closure|null $config = null): static
    {
        $legend = new Legend();

        if ($config instanceof Closure) {
            $config($legend);
        } elseif ($config !== null) {
            $legend->child($config);
        }

        return $this->child($legend);
    }

    /**
     * If this Boolean attribute is set, all form controls that are descendants of the <fieldset> are disabled, meaning they are not editable and won't be submitted along with the <form>.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/fieldset#disabled
     */
    public function disabled(bool $disabled = true): static
    {
        return $disabled ? $this->flag('disabled') : $this;
    }

    /**
     * This attribute takes the value of the id attribute of a <form> element you want the <fieldset> to be part of, even if it is not inside the form.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/fieldset#form
     */
    public function form(string $form): static
    {
        return $this->attr('form', $form);
    }

    /**
     * The name associated with the group.
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/fieldset#name
     */
    public function name(string $name): static
    {
        return $this->attr('name', $name);
    }
}