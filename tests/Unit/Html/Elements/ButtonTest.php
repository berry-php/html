<?php declare(strict_types=1);

use function Berry\Html\button;

test('button renders with attrs', function () {
    expect(button()->text('Click')->type('submit')->disabled()->toString())->toBe('<button type="submit" disabled>Click</button>');
});
