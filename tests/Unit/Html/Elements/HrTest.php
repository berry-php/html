<?php declare(strict_types=1);

use function Berry\Html\hr;

test('hr renders self-closing', function () {
    expect(hr()->toString())->toBe('<hr />');
});
