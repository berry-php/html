<?php declare(strict_types=1);

use function Berry\Html\em;

test('em renders basic', function () {
    expect(em()->toString())->toBe('<em></em>');
});