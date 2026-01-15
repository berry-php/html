<?php declare(strict_types=1);

use function Berry\Html\meta;

test('meta renders charset', function () {
    expect(meta()->charset('utf-8')->toString())->toBe('<meta charset="utf-8" />');
});
