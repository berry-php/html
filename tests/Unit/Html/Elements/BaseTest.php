<?php declare(strict_types=1);

use Berry\Html\Enums\Target;

use function Berry\Html\base;

test('base renders with href and target', function () {
    expect(base()->href('/')->target(Target::Blank)->toString())->toBe('<base href="/" target="_blank" />');
});
