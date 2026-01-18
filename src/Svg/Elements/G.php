<?php declare(strict_types=1);

namespace Berry\Svg\Elements;

use Berry\Svg\SvgTag;

class G extends SvgTag
{
    public function __construct()
    {
        parent::__construct('g');
    }
}
