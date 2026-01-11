<?php declare(strict_types=1);

use Berry\Html5\Enums\Rel;

use function Berry\Html5\link;

test('link renders href rel', function () {
    expect(link()->href('css')->rel(Rel::Stylesheet)->toString())->toBe('<link href="css" rel="stylesheet" />');
});
