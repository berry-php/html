<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\Enums\Target;
use Berry\VoidTag;

class Base extends VoidTag
{
    public function __construct()
    {
        parent::__construct('base');
    }

    public function href(string $href): static
    {
        return $this->attr('href', $href);
    }

    public function target(Target|string $target): static
    {
        if (is_string($target)) {
            $target = Target::from($target);
        }

        return $this->attr('target', $target->value);
    }
}
