<?php

declare(strict_types=1);

use function Berry\Html\div;

test('test class with strings', function () {
    expect(div()->class('a b c')->toString())->toBe('<div class="a b c"></div>');
});

test('test class with array of strings', function () {
    expect(div()->class(['a', 'b', 'c'])->toString())->toBe('<div class="a b c"></div>');
});

test('test class with closure', function () {
    expect(div()->class(fn() => 'a b c')->toString())->toBe('<div class="a b c"></div>');
    expect(div()->class(fn() => ['a', 'b', 'c'])->toString())->toBe('<div class="a b c"></div>');
});

test('test adding class with multiple calls', function () {
    expect(div()->class('a')->class('b')->class('c')->toString())->toBe('<div class="a b c"></div>');
});

test('test conditionally adding classes', function () {
    expect(
        div()
            ->classWhen(true, fn() => 'yes')
            ->classWhen(fn() => false, fn() => 'no')
            ->toString(),
    )
        ->toBe('<div class="yes"></div>');
});

test('test conditionally adding classes with else', function () {
    expect(
        div()
            ->classWhen(true, 'yes', 'no')
            ->classWhen(false, 'hidden', 'visible')
            ->toString(),
    )
        ->toBe('<div class="yes visible"></div>');
});

test('test removing classes', function () {
    expect(
        div()
            ->class('a b c d e f')
            ->removeClass('a')
            ->removeClass(fn() => ['d', 'e', 'f'])
            ->toString(),
    )
        ->toBe('<div class="b c"></div>');
});

test('removes duplicate classes', function () {
    expect(div()->class('a')->class('b')->class('a')->class('a')->toString())->toBe('<div class="a b"></div>');
});

test('adding same class doesnt create duplicates', function () {
    expect(div()->class('a b b b c')->toString())->toBe('<div class="a b c"></div>');
});

test('trims classes while preserving order and removal', function () {
    expect(div()->class([' first ', 'second'])->class([' second ', ' third '])->removeClass('second')->toString())
        ->toBe('<div class="first third"></div>');
});

test('class values escape quotes and ampersands exactly once', function () {
    $html = div()->class('a"b&c')->toString();
    expect($html)->toBe('<div class="a&quot;b&amp;c"></div>');
    $doc = new DOMDocument();
    expect($doc->loadXML($html))->toBeTrue();
    expect($doc->documentElement?->getAttribute('class'))->toBe('a"b&c');
    expect($doc->documentElement?->attributes?->length)->toBe(1);
});
