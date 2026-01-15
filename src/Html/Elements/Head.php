<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Contract\HasChildrenContract;
use Berry\Traits\HasChildren;
use Berry\Tag;

class Head extends Tag implements HasChildrenContract
{
    use HasChildren;

    public function __construct()
    {
        parent::__construct('head');
    }
}
