<?php declare(strict_types=1);

use Berry\Component;
use Berry\Element;

use function Berry\Html\button;

class CounterButton extends Component
{
    public function __construct(
        private int $value
    ) {}

    public function renderComponent(): Element
    {
        return button()
            ->class('btn btn-primary')
            ->attr('hx-post', '/counter/' . ($this->value + 1))
            ->text("+{$this->value}");
    }
}

test('test simple component', function () {
    expect(
        (new CounterButton(42))->toString()
    )->toBe(
        '<button class="btn btn-primary" hx-post="/counter/43">+42</button>'
    );
});
