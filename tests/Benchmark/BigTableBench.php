<?php declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Rendering\ArrayBufferRenderer;
use Berry\Rendering\DirectOutputRenderer;
use Berry\Rendering\Renderer;
use Berry\Rendering\ResourceRenderer;

use function Berry\Html5\table;
use function Berry\Html5\td;
use function Berry\Html5\tr;

class BigTableBench
{
    private function buildTable(int $rows, int $cols, Renderer $renderer): void
    {
        $table = table();

        for ($row = 0; $row < $rows; $row++) {
            $tr = tr();

            for ($col = 0; $col < $cols; $col++) {
                $tr->child(td()->text("$row x $col"));
            }

            $table->child($tr);
        }

        $table->render($renderer);
    }

    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchBuild100x100TableArrayBufferRenderer(): void
    {
        $this->buildTable(100, 100, new ArrayBufferRenderer());
    }

    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchBuild100x100TableResourceRenderer(): void
    {
        $this->buildTable(100, 100, ResourceRenderer::temp());
    }

    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchBuild100x100TableDirectOutputRenderer(): void
    {
        ob_start();
        $this->buildTable(100, 100, new DirectOutputRenderer());
        ob_end_clean();
    }

    /**
     * @Revs(10)
     * @Iterations(1)
     */
    public function benchBuild1000x1000TableArrayBufferRenderer(): void
    {
        $this->buildTable(1000, 1000, new ArrayBufferRenderer());
    }

    /**
     * @Revs(10)
     * @Iterations(1)
     */
    public function benchBuild1000x1000TableResourceRenderer(): void
    {
        $this->buildTable(1000, 1000, ResourceRenderer::temp());
    }

    /**
     * @Revs(10)
     * @Iterations(1)
     */
    public function benchBuild1000x1000TableDirectOutputRenderer(): void
    {
        ob_start();
        $this->buildTable(1000, 1000, new DirectOutputRenderer());
        ob_end_clean();
    }
}
