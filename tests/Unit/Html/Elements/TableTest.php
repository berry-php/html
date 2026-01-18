<?php declare(strict_types=1);

use Berry\Html\Elements\TBody;
use Berry\Html\Elements\Td;
use Berry\Html\Elements\TFoot;
use Berry\Html\Elements\THead;
use Berry\Html\Elements\Th;
use Berry\Html\Elements\Tr;
use function Berry\Html\table;
use function Berry\Html\tbody;
use function Berry\Html\td;
use function Berry\Html\tfoot;
use function Berry\Html\th;
use function Berry\Html\thead;
use function Berry\Html\tr;

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

test('table renders with comfort functions', function () {
    expect(
        table()
            ->thead(function (THead $thead): THead {
                return $thead->tr(function (Tr $tr): Tr {
                    return $tr->th(function (Th $th): Th {
                        return $th->text('Col 1');
                    })->th(function (Th $th): Th {
                        return $th->text('Col 2');
                    });
                });
            })
            ->tbody(function (TBody $tbody): TBody {
                return $tbody->tr(function (Tr $tr): Tr {
                    return $tr->td(function (Td $td): Td {
                        return $td->text('Row 1 Col 1');
                    })->td(function (Td $td): Td {
                        return $td->text('Row 1 Col 2');
                    });
                });
            })
            ->tfoot(function (TFoot $tfoot): TFoot {
                return $tfoot->tr(function (Tr $tr): Tr {
                    return $tr->td(function (Td $td): Td {
                        return $td->text('Foot 1');
                    })->td(function (Td $td): Td {
                        return $td->text('Foot 2');
                    });
                });
            })
            ->toString()
    )->toBe('<table><thead><tr><th>Col 1</th><th>Col 2</th></tr></thead><tbody><tr><td>Row 1 Col 1</td><td>Row 1 Col 2</td></tr></tbody><tfoot><tr><td>Foot 1</td><td>Foot 2</td></tr></tfoot></table>');
});

test('tr renders with comfort functions', function () {
    expect(
        tr()
            ->th(function ($th) {
                return $th->text('Header');
            })
            ->td(function ($td) {
                return $td->text('Data');
            })
            ->toString()
    )->toBe('<tr><th>Header</th><td>Data</td></tr>');
});
