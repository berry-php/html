<?php

declare(strict_types=1);

namespace Berry\Xml\Traits;

use Berry\Escaper;
use Closure;
use Stringable;

trait HasXmlText
{
    /** @param Stringable|string|int|float|bool|(Closure(): (Stringable|string|int|float|bool|null))|null $text */
    public function text(Stringable|string|int|float|bool|Closure|null $text): static
    {
        if ($text instanceof Closure) {
            $text = $text();
        }

        if ($text !== null) {
            $this->body .= Escaper::escapeXml((string) $text);
        }

        return $this;
    }
}
