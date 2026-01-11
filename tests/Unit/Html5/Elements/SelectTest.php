<?php declare(strict_types=1);

use function Berry\Html5\select;

test('select renders name multiple', function () {
    expect(select()->name('choice')->multiple()->toString())->toBe('<select name="choice" multiple></select>');
});
