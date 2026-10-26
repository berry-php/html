<?php

declare(strict_types=1);

namespace Berry;

use Stringable;

interface Element extends Stringable
{
    public function toString(): string;
}
