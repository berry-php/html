<?php declare(strict_types=1);

use function Berry\Html5\section;

test('section renders with text', function () {
    expect(section()->text('Sec')->toString())->toBe('<section>Sec</section>');
});
