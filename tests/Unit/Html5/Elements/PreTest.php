<?php declare(strict_types=1);

use function Berry\Html5\pre;

test('pre renders with text', function () {
    expect(pre()->text('Code')->toString())->toBe('<pre>Code</pre>');
});
