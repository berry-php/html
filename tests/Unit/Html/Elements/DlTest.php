<?php declare(strict_types=1);

use function Berry\Html\b;
use function Berry\Html\dl;
use function Berry\Html\dt;
use function Berry\Html\dd;

test('dl renders basic', function () {
    expect(dl()->toString())->toBe('<dl></dl>');
});

test('dt renders basic', function () {
    expect(dt()->toString())->toBe('<dt></dt>');
});

test('dd renders basic', function () {
    expect(dd()->toString())->toBe('<dd></dd>');
});

test('dl with content', function () {
    $result = dl()
        ->child(dt()->text('Term 1'))
        ->child(dd()->text('Definition 1'))
        ->child(dt()->text('Term 2'))
        ->child(dd()->text('Definition 2'))
        ->toString();

    expect($result)->toBe('<dl><dt>Term 1</dt><dd>Definition 1</dd><dt>Term 2</dt><dd>Definition 2</dd></dl>');
});

test('dl renders with comfort functions', function () {
    expect(
        dl()
            ->dt(function ($dt) {
                return $dt->text('Term 1');
            })
            // ->dd('Def 1') // Skipped due to method name conflict
            ->dt(b()->text('Term 2'))
            ->toString()
    )->toBe('<dl><dt>Term 1</dt><dt><b>Term 2</b></dt></dl>');
});
