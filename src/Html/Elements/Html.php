<?php declare(strict_types=1);

namespace Berry\Html\Elements;

use Berry\Html\HtmlTag;
use Berry\Rendering\Renderer;

class Html extends HtmlTag
{
    public function __construct()
    {
        parent::__construct('html');
    }

    public function render(Renderer $renderer): void
    {
        $renderer->write('<!DOCTYPE html>');
        parent::render($renderer);
    }

    public function lang(string $lang): static
    {
        return $this->attr('lang', $lang);
    }
}
