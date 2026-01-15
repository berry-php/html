<?php declare(strict_types=1);

use function Berry\Html\details;
use function Berry\Html\summary;

test('details renders open', function () {
    expect(details()->open()->child(summary()->text('Sum'))->toString())->toBe('<details open><summary>Sum</summary></details>');
});
