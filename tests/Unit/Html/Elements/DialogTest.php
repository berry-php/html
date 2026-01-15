<?php declare(strict_types=1);

use function Berry\Html\dialog;

test('dialog renders open', function () {
    expect(dialog()->open()->text('Content')->toString())->toBe('<dialog open>Content</dialog>');
});
