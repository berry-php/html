<?php declare(strict_types=1);

use function Berry\Html\del;

test('del renders with attributes and content', function () {
    expect(del()->cite('https://cite.example')->datetime('2020-01-01')->text('Deleted')->toString())
        ->toBe('<del cite="https://cite.example" datetime="2020-01-01">Deleted</del>');
});