<?php declare(strict_types=1);

use function Berry\Html5\body;
use function Berry\Html5\head;
use function Berry\Html5\html;

test('html renders with children', function () {
    expect(html()->child(head())->child(body())->toString())->toBe('<!DOCTYPE html><html><head></head><body></body></html>');
});
