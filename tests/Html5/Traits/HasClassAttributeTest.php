<?php declare(strict_types=1);

use function Berry\Html5\div;

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
    expect(div()->classWhen(true, 'yes')->classWhen(fn() => false, 'no')->toString())->toBe('<div class="yes"></div>');
});

test('test removing classes', function () {
    expect(div()->class('a b c d e f')->removeClass('a')->removeClass(fn() => ['d', 'e', 'f'])->toString())->toBe('<div class="b c"></div>');
});

test('removes duplicate classes', function () {
    expect(div()->class('a')->class('b')->class('a')->class('a')->toString())->toBe('<div class="a b"></div>');
});

test('test getClasses()', function () {
    expect(div()->class('a')->class('b c')->class(['d', 'e', 'e', 'f'])->getClasses())->toBe(['a', 'b', 'c', 'd', 'e', 'f']);
});
