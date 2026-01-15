<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;

class Th extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('th');
    }
}
