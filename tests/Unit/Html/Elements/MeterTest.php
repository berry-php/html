<?php declare(strict_types=1);

use function Berry\Html\meter;

test('meter renders basic', function () {
    expect(meter()->toString())->toBe('<meter></meter>');
});

test('meter with attributes', function () {
    expect(meter()->value(0.8)->min(0)->max(1)->low(0.2)->high(0.8)->optimum(0.9)->toString())
        ->toBe('<meter value="0.8" min="0" max="1" low="0.2" high="0.8" optimum="0.9"></meter>');
});