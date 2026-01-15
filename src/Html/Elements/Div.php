<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class Div extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('div');
    }
}
