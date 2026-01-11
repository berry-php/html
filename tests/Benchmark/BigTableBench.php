<?php declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Rendering\StringRenderer;

use function Berry\Html5\table;
use function Berry\Html5\td;
use function Berry\Html5\tr;

class BigTableBench
{
    private function buildTable(int $rows, int $cols, ?StringRenderer $renderer = null): void
    {
        $table = table();

        for ($row = 0; $row < $rows; $row++) {
            $tr = tr();

            for ($col = 0; $col < $cols; $col++) {
                $tr->child(td()->text("$row x $col"));
            }

            $table->child($tr);
        }

        $table->toString();
    }

    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchBuild100x100Table(): void
    {
        $this->buildTable(100, 100);
    }

    /**
     * @Revs(10)
     * @Iterations(1)
     */
    public function benchBuild1000x1000Table(): void
    {
        $this->buildTable(1000, 1000);
    }
}
