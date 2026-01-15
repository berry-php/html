<?php declare(strict_types=1);

use function Berry\Html\abbr;

test('abbr renders basic', function () {
    expect(abbr()->toString())->toBe('<abbr></abbr>');
});

test('abbr with title', function () {
    expect(abbr()->title('HTML')->toString())->toBe('<abbr title="HTML"></abbr>');
});