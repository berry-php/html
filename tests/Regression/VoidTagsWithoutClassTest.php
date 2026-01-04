<?php declare(strict_types=1);

use Berry\Html5\Elements\Input;
use Berry\Html5\Enums\InputType;
use Berry\Component;
use Berry\Element;

use function Berry\Html5\input;
use function Berry\Html5\label;
use function Berry\Html5\p;
use function Berry\Html5\span;

class Textfield extends Component
{
    public function __construct(
        protected string $label,
        protected string $name,
        protected InputType $type = InputType::Text,
        protected ?string $value = null,
        protected ?string $error = null,
    ) {}

    public function renderComponent(): Element
    {
        return label()
            ->class('floating-label')
            ->child(span()->text($this->label))
            ->child(
                input()
                    ->name($this->name)
                    ->class('input w-full')
                    ->classWhen($this->error !== null, 'input-error')
                    ->mapWhen($this->value !== null, fn(Input $input) => $input->value($this->value ?? ''))
                    ->type($this->type)
            )
            ->childWhen($this->error !== null, fn() => p()->class('text-error text-xs')->text($this->error));
    }
}

class Emailfield extends Textfield
{
    public function __construct(string $label, string $name, ?string $value = null, ?string $error = null)
    {
        parent::__construct($label, $name, InputType::Email, $value, $error);
    }
}

test('regression test: class / value empty', function () {
    expect(new Emailfield('E-Mail', 'email')->toString())->toBe('<label class="floating-label"><span>E-Mail</span><input name="email" class="input w-full" type="email" /></label>');
    expect(new Emailfield('E-Mail', 'email', 'test@example.com')->toString())->toBe('<label class="floating-label"><span>E-Mail</span><input name="email" class="input w-full" value="test@example.com" type="email" /></label>');
    expect(new Emailfield('E-Mail', 'email', 'test@', 'Invalid')->toString())->toBe('<label class="floating-label"><span>E-Mail</span><input name="email" class="input w-full input-error" value="test@" type="email" /><p class="text-error text-xs">Invalid</p></label>');
});
