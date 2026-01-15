<?php declare(strict_types=1);

use function Berry\Html\article;
use function Berry\Html\p;

test('article renders with child', function () {
    expect(article()->child(p()->text('Text'))->toString())->toBe('<article><p>Text</p></article>');
});
