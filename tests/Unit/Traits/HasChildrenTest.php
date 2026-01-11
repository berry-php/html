<?php declare(strict_types=1);

use function Berry\Html5\b;
use function Berry\Html5\div;
use function Berry\Html5\li;
use function Berry\Html5\ul;

test('add children via function', function () {
    expect(
        div()->child(fn() => b()->text('Hello, World'))->toString()
    )->toBe('<div><b>Hello, World</b></div>');
});

test('add children conditionally', function () {
    expect(
        ul()
            ->childWhen(false, li()->text('This should not appear'))
            ->childWhen(fn() => false, li()->text('This should not appear either'))
            ->childWhen(true, li()->text('This should'))
            ->childWhen(fn() => true, li()->text('This should too'))
            ->toString()
    )->toBe('<ul><li>This should</li><li>This should too</li></ul>');
});

test('add multiple children at once', function () {
    expect(
        ul()
            ->children(
                array_map(
                    fn(string $text) => li()->text($text),
                    ['One', 'Two', 'Three']
                )
            )
            ->toString()
    )->toBe('<ul><li>One</li><li>Two</li><li>Three</li></ul>');
});

test('add text when no children were added', function () {
    expect(
        ul()
            ->children(
                array_map(
                    fn(string $text) => li()->text($text),
                    []
                ),
                fn() => li()->text('No elements found')
            )
            ->toString()
    )->toBe('<ul><li>No elements found</li></ul>');
});
