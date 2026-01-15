<?php declare(strict_types=1);

use function Berry\Html\progress;

test('progress renders basic', function () {
    expect(progress()->toString())->toBe('<progress></progress>');
});

test('progress with value and max', function () {
    expect(progress()->value(75)->max(100)->toString())->toBe('<progress value="75" max="100"></progress>');
});