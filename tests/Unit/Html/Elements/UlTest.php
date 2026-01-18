<?php declare(strict_types=1);

use function Berry\Html\a;
use function Berry\Html\li;
use function Berry\Html\ul;

test('ul renders with li', function () {
    expect(ul()->child(li())->toString())->toBe('<ul><li></li></ul>');
});

test('ul renders with comfort functions', function () {
    expect(
        ul()
            ->li(function ($li) {
                return $li->text('Item 1');
            })
            ->li(a()->href('#'))
            ->toString()
    )->toBe('<ul><li>Item 1</li><li><a href="#"></a></li></ul>');
});
