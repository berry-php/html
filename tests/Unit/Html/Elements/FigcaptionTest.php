<?php

declare(strict_types=1);

use function Berry\Html\figcaption;

test('figcaption renders basic', function () {
    expect(figcaption()->toString())->toBe('<figcaption></figcaption>');
});

test('figcaption renders with text', function () {
    expect(figcaption()->text('Caption Text')->toString())->toBe('<figcaption>Caption Text</figcaption>');
});
