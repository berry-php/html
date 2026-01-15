<?php declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Rendering\ArrayBufferRenderer;
use Berry\Rendering\DirectOutputRenderer;
use Berry\Rendering\ResourceRenderer;
use Berry\Element;
use Generator;

use function Berry\Html\table;
use function Berry\Html\td;
use function Berry\Html\tr;

/**
 * @BeforeMethods({"setUp"})
 * @ParamProviders({"provideTableSizes"})
 * @Revs(10)
 */
class BigTableBench
{
    private Element $table;

    /**
     * @return Generator<string, array<string, int>> $params
     */
    public function provideTableSizes(): Generator
    {
        yield 'small' => ['rows' => 10, 'cols' => 10];
        yield 'medium' => ['rows' => 100, 'cols' => 100];
        yield 'large' => ['rows' => 1000, 'cols' => 1000];
    }

    /**
     * @param array<string, int> $params
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
                $tr->child(td()->text("$row x $col"));
            }

            $table->child($tr);
        }

        return $table;
    }

    /**
     * @param array<string, int> $params
     */
    public function benchBuildingTable(array $params): void
    {
        $this->buildTable($params['rows'], $params['cols']);
    }

    /**
     * @param array<string, int> $params
     */
    public function benchArrayBufferRenderer(array $params): void
    {
        $renderer = new ArrayBufferRenderer();
        $this->table->render($renderer);
    }

    /**
     * @param array<string, int> $params
     */
    public function benchResourceRenderer(array $params): void
    {
        $renderer = ResourceRenderer::temp();
        $this->table->render($renderer);
    }

    /**
     * @param array<string, int> $params
     */
    public function benchDirectOutputRenderer(array $params): void
    {
        $renderer = new DirectOutputRenderer();
        ob_start();
        $this->table->render($renderer);
        ob_end_clean();
    }
}
