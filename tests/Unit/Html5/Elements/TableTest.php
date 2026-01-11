<?php declare(strict_types=1);

use function Berry\Html5\table;
use function Berry\Html5\tbody;
use function Berry\Html5\td;
use function Berry\Html5\tfoot;
use function Berry\Html5\th;
use function Berry\Html5\thead;
use function Berry\Html5\tr;

test('table renders with child', function () {
    expect(
        table()
            ->child(thead()->child(th()->text('Col')))
            ->child(tbody()->child(tr()->child(td()->text('Hello, Table'))))
            ->child(tfoot()->child(tr()->child(td()->text('Foot'))))
            ->toString()
    )->toBe('<table><thead><th>Col</th></thead><tbody><tr><td>Hello, Table</td></tr></tbody><tfoot><tr><td>Foot</td></tr></tfoot></table>');
});

test('table with colspan and rowspan', function () {
    $html = td()
        ->colspan(2)
        ->rowspan(3)
        ->text('Spanning Cell')
        ->toString();

    expect($html)->toBe('<td colspan="2" rowspan="3">Spanning Cell</td>');
});

test('colspan throws exception for values less than 1', function () {
    expect(fn() => td()->colspan(0))
        ->toThrow(InvalidArgumentException::class, 'colspan has to be at least 1');
});

test('rowspan throws exception for values less than 1', function () {
    expect(fn() => td()->rowspan(-1))
        ->toThrow(InvalidArgumentException::class, 'rowspan has to be at least 1');
});
