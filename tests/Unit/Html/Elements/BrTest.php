<?php declare(strict_types=1);

use function Berry\Html\br;

test('br renders basic', function () {
    expect(br()->toString())->toBe('<br />');
});
