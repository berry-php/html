<?php

declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Element;
use Berry\Escaper;
use Generator;

use function Berry\Html\table;
use function Berry\Html\td;
use function Berry\Html\tr;

/**
 * @ParamProviders({"provideTableSizes"})
 * @Revs(10)
 * @Iterations(3)
 * @Warmup(2)
 */
class BigTableBench
{
    private Element $table;

    /**
     * @return Generator<string, array{rows: int, cols: int}> $params
     */
    public function provideTableSizes(): Generator
    {
        yield 'small' => ['rows' => 10, 'cols' => 10];
        yield 'page' => ['rows' => 100, 'cols' => 8];
        yield 'medium' => ['rows' => 100, 'cols' => 100];
        yield 'large' => ['rows' => 1000, 'cols' => 1000];
    }

    /**
     * @param array{rows: int, cols: int} $params
     */
    public function setUp(array $params): void
    {
        $this->table = $this->buildTable($params['rows'], $params['cols']);
    }

    private function buildTable(int $rows, int $cols): Element
    {
        $table = table();

        for ($row = 0; $row < $rows; $row++) {
            $tr = tr();

            for ($col = 0; $col < $cols; $col++) {
                $tr->child(td()->text("{$row} x {$col}"));
            }

            $table->child($tr);
        }

        return $table;
    }

    /**
     * @param array{rows: int, cols: int} $params
     */
    public function benchBuildingTable(array $params): void
    {
        $this->buildTable($params['rows'], $params['cols']);
    }

    /**
     * @param array{rows: int, cols: int} $params
     * @BeforeMethods({"setUp"})
     * @Revs(100)
     * @Warmup(200)
     */
    public function benchSerializePrebuiltTable(array $params): void
    {
        $this->table->toString();
    }

    /**
     * @param array{rows: int, cols: int} $params
     */
    public function benchBuildingTableAndRendering(array $params): void
    {
        $table = $this->buildTable($params['rows'], $params['cols']);
        $table->toString();
    }

    /**
     * For comparison, this is probably the ground level for us
     *
     * @param array{rows: int, cols: int} $params
     */
    public function benchPhpStringConcat(array $params): void
    {
        $out = '<table>';

        for ($row = 0; $row < $params['rows']; $row++) {
            $out .= '<tr>';

            for ($col = 0; $col < $params['cols']; $col++) {
                // escape to stay fair
                $content = Escaper::escape("{$row} x {$col}");

                $out .= "<td>{$content}</td>";
            }

            $out .= '</tr>';
        }

        $out .= '</table>';
    }
}
