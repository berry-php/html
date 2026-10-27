<?php

declare(strict_types=1);

namespace Berry\Svg;

use Berry\Html\HtmlTag;
use Berry\Escaper;
use Berry\Xml\Traits\HasXmlAttributes;
use Berry\Xml\Traits\HasXmlText;
use Override;

abstract class SvgTag extends HtmlTag
{
    use HasXmlAttributes;
    use HasXmlText;

    /** @return array<string, string|true> */
    #[Override]
    public function getAttributes(): array
    {
        $attributes = $this->attributes ?? [];

        if ($this->classes) {
            $attributes['class'] = Escaper::escapeXml($this->classString());
        }
        if ($this->styles) {
            $attributes['style'] = Escaper::escapeXml($this->styleString());
        }

        return $attributes;
    }
}
