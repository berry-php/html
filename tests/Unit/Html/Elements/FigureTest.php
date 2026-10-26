<?php

declare(strict_types=1);

use function Berry\Html\b;
use function Berry\Html\figcaption;
use function Berry\Html\figure;

test('figure renders basic', function () {
    expect(figure()->toString())->toBe('<figure></figure>');
});

test('figure renders with figcaption child', function () {
    expect(
        figure()
            ->child(figcaption()->text('Caption Text'))
            ->toString(),
    )
        ->toBe('<figure><figcaption>Caption Text</figcaption></figure>');
});

test('figure renders with comfort functions', function () {
    expect(
        figure()
            ->figcaption(fn($figcaption) => $figcaption->text('Caption Text'))
            ->toString(),
    )
        ->toBe('<figure><figcaption>Caption Text</figcaption></figure>');
});

test('figure figcaption helper accepts child elements', function () {
    expect(
        figure()
            ->figcaption(b()->text('Caption Text'))
            ->toString(),
    )
        ->toBe('<figure><figcaption><b>Caption Text</b></figcaption></figure>');
});
