<?php declare(strict_types=1);

use function Berry\Html5\textarea;

test('textarea renders value rows', function () {
    expect(textarea()->text('Text')->rows(5)->toString())->toBe('<textarea rows="5">Text</textarea>');
});
