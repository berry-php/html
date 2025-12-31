<?php declare(strict_types=1);

use Berry\Html5\Elements\A;

use function Berry\Html5\a;

test('map conditionally', function () {
    $mkLink = fn(bool $active) => a()
        ->href('https://example.com')
        ->map(function (A $a) use ($active): A {
            if ($active) {
                return $a->class('active');
            }
            return $a;
        })
        ->text('Link')
        ->toString();

    expect($mkLink(true))->toBe('<a href="https://example.com" class="active">Link</a>');
    expect($mkLink(false))->toBe('<a href="https://example.com">Link</a>');

    $mkLink = fn(bool $active) => a()
        ->href('https://example.com')
        ->mapWhen($active, fn(A $a): A => $a->class('active'))
        ->text('Link')
        ->toString();

    expect($mkLink(true))->toBe('<a href="https://example.com" class="active">Link</a>');
    expect($mkLink(false))->toBe('<a href="https://example.com">Link</a>');
});
