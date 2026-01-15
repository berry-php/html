<?php declare(strict_types=1);

use function Berry\Html\blockquote;

test('blockquote renders basic', function () {
    expect(blockquote()->toString())->toBe('<blockquote></blockquote>');
});

test('blockquote with cite', function () {
    expect(blockquote()->cite('https://example.com')->toString())->toBe('<blockquote cite="https://example.com"></blockquote>');
});