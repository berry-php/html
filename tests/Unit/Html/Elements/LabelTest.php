<?php declare(strict_types=1);

use function Berry\Html\label;

test('label renders for text', function () {
    expect(label()->for('id')->text('Label')->toString())->toBe('<label for="id">Label</label>');
});
