<?php declare(strict_types=1);

use function Berry\Html5\article;
use function Berry\Html5\p;

test('article renders with child', function () {
    expect(article()->child(p()->text('Text'))->toString())->toBe('<article><p>Text</p></article>');
});
