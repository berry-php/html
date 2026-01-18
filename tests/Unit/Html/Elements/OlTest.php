<?php declare(strict_types=1);

use function Berry\Html\li;
use function Berry\Html\ol;
use function Berry\Html\span;

test('ol renders with li', function () {
    expect(ol()->child(li())->toString())->toBe('<ol><li></li></ol>');
});

test('ol renders extended attributes', function () {
    $res = ol()->reversed()->start(3)->type('A')->toString();
    expect($res)->toBe('<ol reversed start="3" type="A"></ol>');
});

test('ol renders with comfort functions', function () {
    expect(
        ol()
            ->li(function ($li) {
                return $li->text('Item 1');
            })
            ->li(span()->text('Item 2'))
            ->toString()
    )->toBe('<ol><li>Item 1</li><li><span>Item 2</span></li></ol>');
});
