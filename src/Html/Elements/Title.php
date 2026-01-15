<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Contract\HasTextContract;
use Berry\Traits\HasText;
use Berry\Tag;

class Title extends Tag implements HasTextContract
{
    use HasText;

    public function __construct()
    {
        parent::__construct('title');
    }
}
