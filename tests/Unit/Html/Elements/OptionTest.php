<?php declare(strict_types=1);

use function Berry\Html\option;

test('option renders value text', function () {
    expect(option()->value('1')->text('One')->toString())->toBe('<option value="1">One</option>');
});
