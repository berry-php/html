<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlVoidTag;

class Hr extends HtmlVoidTag
{
    public function __construct()
    {
        parent::__construct('hr');
    }
}
