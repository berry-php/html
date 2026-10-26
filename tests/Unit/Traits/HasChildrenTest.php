<?php

declare(strict_types=1);

use function Berry\Html\b;
use function Berry\Html\div;
use function Berry\Html\li;
use function Berry\Html\ul;

test('add children via function', function () {
    expect(div()->child(fn() => b()->text('Hello, World'))->toString())->toBe('<div><b>Hello, World</b></div>');
});

test('add children conditionally', function () {
    expect(
        ul()
            ->childWhen(false, fn() => li()->text('This should not appear'))
            ->childWhen(fn() => false, fn() => li()->text('This should not appear either'))
            ->childWhen(true, fn() => li()->text('This should'))
            ->childWhen(fn() => true, fn() => li()->text('This should too'))
            ->toString(),
    )
        ->toBe('<ul><li>This should</li><li>This should too</li></ul>');
});

test('add children conditionally with else', function () {
    expect(
        ul()
            ->childWhen(true, fn() => li()->text('Shown'), fn() => li()->text('Hidden'))
            ->childWhen(false, fn() => li()->text('Hidden'), fn() => li()->text('Shown too'))
            ->toString(),
    )
        ->toBe('<ul><li>Shown</li><li>Shown too</li></ul>');
});

test('add multiple children at once', function () {
    expect(
        ul()
            ->children(array_map(fn(string $text) => li()->text($text), ['One', 'Two', 'Three']))
            ->toString(),
    )
        ->toBe('<ul><li>One</li><li>Two</li><li>Three</li></ul>');
});

test('add text when no children were added', function () {
    expect(
        ul()
            ->children(array_map(fn(string $text) => li()->text($text), []), fn() => li()->text('No elements found'))
            ->toString(),
    )
        ->toBe('<ul><li>No elements found</li></ul>');
});

test('children accepts iterators and iterator aggregates', function () {
    expect(ul()->children(new ArrayIterator([li()->text('One'), null, li()->text('Two')]))->toString())
        ->toBe('<ul><li>One</li><li>Two</li></ul>');
    expect(ul()->children(new ArrayObject([li()->text('One')]))->toString())
        ->toBe('<ul><li>One</li></ul>');
});

test('generator children are consumed once and rendered immediately', function () {
    $parent = ul();
    $generator = (function () use ($parent) {
        yield 'first' => li()->text('One');
        expect($parent->toString())->toBe('<ul><li>One</li></ul>');
        yield 'first' => li()->text('Two');
    })();

    expect($parent->children($generator)->toString())->toBe('<ul><li>One</li><li>Two</li></ul>');
    expect($generator->valid())->toBeFalse();
});

test('children closures can return generators', function () {
    expect(
        ul()->children(function () {
            yield li()->text('One');
            yield li()->text('Two');
        })->toString(),
    )
        ->toBe('<ul><li>One</li><li>Two</li></ul>');
});

test('empty iterators invoke the fallback exactly once', function () {
    $calls = 0;
    $fallback = function () use (&$calls) {
        $calls++;
        return li()->text('Empty');
    };
    $empty = (function () {
        yield from [];
    })();

    expect(ul()->children($empty, $fallback)->toString())->toBe('<ul><li>Empty</li></ul>');
    expect($calls)->toBe(1);
    expect(ul()->children(new ArrayIterator(), li()->text('Empty'))->toString())
        ->toBe('<ul><li>Empty</li></ul>');
    expect(ul()->children(new ArrayObject())->toString())->toBe('<ul></ul>');
});

test('nonempty iterables containing null do not trigger the empty fallback', function () {
    expect(
        ul()
            ->children(
                (function () {
                    yield null;
                })(),
                fn() => li()->text('Empty'),
            )
            ->toString(),
    )
        ->toBe('<ul></ul>');
});
