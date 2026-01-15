<?php declare(strict_types=1);

use function Berry\Html\body;
use function Berry\Html\head;
use function Berry\Html\html;

test('html renders with children', function () {
    expect(html()->child(head())->child(body())->toString())->toBe('<!DOCTYPE html><html><head></head><body></body></html>');
});
