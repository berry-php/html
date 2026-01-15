<?php declare(strict_types=1);

namespace Berry\Rendering;

class StringConcatRenderer implements StringRenderer
{
    private string $output = '';

    public function renderToString(): string
    {
        return $this->output;
    }

    public function write(string $content): void
    {
        $this->output .= $content;
    }
}
