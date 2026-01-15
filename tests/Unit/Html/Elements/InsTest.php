<?php declare(strict_types=1);

use function Berry\Html\ins;

test('ins renders with attributes and content', function () {
    expect(ins()->cite('https://cite.example')->datetime('2020-01-01')->text('Inserted')->toString())
        ->toBe('<ins cite="https://cite.example" datetime="2020-01-01">Inserted</ins>');
});