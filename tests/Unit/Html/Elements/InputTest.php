<?php declare(strict_types=1);

use Berry\Html\Enums\InputType;

use function Berry\Html\input;

test('input renders type name', function () {
    expect(input()->type(InputType::Text)->name('user')->toString())->toBe('<input type="text" name="user" />');
});

test('input renders checked', function () {
    expect(input()->type(InputType::Checkbox)->checked()->toString())->toBe('<input type="checkbox" checked />');
});
