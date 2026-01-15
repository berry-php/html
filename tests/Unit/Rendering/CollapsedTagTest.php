<?php declare(strict_types=1);

use function Berry\Html\div;
use function Berry\Html\p;
use function Berry\Html\span;

test('collapses text-only leaf child', function () {
    expect(div()->child(p()->text('Hello'))->toString())
        ->toBe('<div><p>Hello</p></div>');
});

test('does not collapse when attributes present', function () {
    expect(div()->child(p()->class('x')->text('A'))->toString())
        ->toBe('<div><p class="x">A</p></div>');
});

test('does not collapse when element-children present', function () {
    expect(div()->child(p()->child(span()->text('A')))->toString())
        ->toBe('<div><p><span>A</span></p></div>');
});

test('preserves order around collapsed children', function () {
    expect(div()->text('A')->child(p()->text('B'))->text('C')->toString())
        ->toBe('<div>A<p>B</p>C</div>');
});

test('modifying original tag after collapse does not affect parent', function () {
    $leaf = p()->text('X');
    $parent = div()->child($leaf);
    $leaf->text('Y');
    expect($parent->toString())->toBe('<div><p>X</p></div>');
});

test('unsafeRaw collapses without escaping', function () {
    expect(div()->child(p()->unsafeRaw('<b>Raw</b>'))->toString())
        ->toBe('<div><p><b>Raw</b></p></div>');
});

test('inspector shows collapsed tag', function () {
    $res = div()->child(p()->text('Hi'))->dump(true)->toString();
    expect($res)->toContain('Berry\\CollapsedTag');
});
