<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Element;
use Closure;

/**
 * The HTML <table> element represents tabular data — that is, information presented in a two-dimensional table comprised of rows and columns of cells containing data.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/table
 */
class Table extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('table');
    }

    /**
     * Adds a new tr element.
     * @param Element|(Closure(Tr): Tr)|null $config
     */
    public function tr(Element|Closure|null $config = null): static
    {
        $tr = new Tr();

        if ($config instanceof Closure) {
            $config($tr);
        } elseif ($config !== null) {
            $tr->child($config);
        }

        return $this->child($tr);
    }

    /**
     * Adds a new thead element.
     * @param Element|(Closure(THead): THead)|null $config
     */
    public function thead(Element|Closure|null $config = null): static
    {
        $thead = new THead();

        if ($config instanceof Closure) {
            $config($thead);
        } elseif ($config !== null) {
            $thead->child($config);
        }

        return $this->child($thead);
    }

    /**
     * Adds a new tbody element.
     * @param Element|(Closure(TBody): TBody)|null $config
     */
    public function tbody(Element|Closure|null $config = null): static
    {
        $tbody = new TBody();

        if ($config instanceof Closure) {
            $config($tbody);
        } elseif ($config !== null) {
            $tbody->child($config);
        }

        return $this->child($tbody);
    }

    /**
     * Adds a new tfoot element.
     * @param Element|(Closure(TFoot): TFoot)|null $config
     */
    public function tfoot(Element|Closure|null $config = null): static
    {
        $tfoot = new TFoot();

        if ($config instanceof Closure) {
            $config($tfoot);
        } elseif ($config !== null) {
            $tfoot->child($config);
        }

        return $this->child($tfoot);
    }
}