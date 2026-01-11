<?php declare(strict_types=1);

use function Berry\Html5\label;

test('label renders for text', function () {
    expect(label()->for('id')->text('Label')->toString())->toBe('<label for="id">Label</label>');
});
