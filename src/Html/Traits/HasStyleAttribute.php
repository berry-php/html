<?php declare(strict_types=1);

namespace Berry\Html\Traits;

use Berry\Traits\HasAttributes;

trait HasStyleAttribute
{
    use HasAttributes;

    /** @var array<string, string> */
    protected array $styles = [];

    /**
     * Contains CSS styling declarations to be applied to the element.
     *
     * Example:
     *      div()->style(['background' => '#0099FF', 'color' => 'white'])
     *
     * @param array<string, string> $style
     */
    public function style(array $style): static
    {
        // dont do anything when styles are empty
        if (count($style) === 0) {
            return $this;
        }

        $this->styles = array_merge($this->styles, $style);

        // to mark the inserted position, this will be replaced later
        $this->attr('style', '');

        return $this;
    }

    protected function styleString(): string
    {
        return implode('; ', array_map(fn(string $key) => "$key: {$this->styles[$key]}", array_keys($this->styles)));
    }
}
