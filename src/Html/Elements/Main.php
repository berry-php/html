<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class Main extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('main');
    }
}
