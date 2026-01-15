<?php declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Rendering\DirectOutputRenderer;
use Berry\Rendering\Renderer;
use Berry\Rendering\ResourceRenderer;
use Berry\Rendering\StringConcatRenderer;
use Berry\Element;
use Generator;

use function Berry\Html\table;
use function Berry\Html\td;
use function Berry\Html\tr;

/**
 * @BeforeMethods({"setUp"})
 * @ParamProviders({"provideRenderers", "provideTableSizes"})
 * @Revs(10)
 */
class BigTableBench
{
    private Element $table;
    private Renderer $renderer;

    /**
     * @return Generator<string, array{rows: int, cols: int}> $params
     */
    public function provideTableSizes(): Generator
    {
        yield 'small' => ['rows' => 10, 'cols' => 10];
        yield 'medium' => ['rows' => 100, 'cols' => 100];
        yield 'large' => ['rows' => 1000, 'cols' => 1000];
    }

    /**
     * @return Generator<string, array{renderer_class: class-string<Renderer>}>
     */
    public function provideRenderers(): Generator
    {
        yield 'string_concat' => ['renderer_class' => StringConcatRenderer::class];
        yield 'resource' => ['renderer_class' => ResourceRenderer::class];
        yield 'direct_output' => ['renderer_class' => DirectOutputRenderer::class];
    }

    /**
     * @param array{rows: int, cols: int, renderer_class: class-string<Renderer>} $params
     */
    public function setUp(array $params): void
    {
        $this->table = $this->buildTable($params['rows'], $params['cols']);
        $this->renderer = match ($params['renderer_class']) {
            ResourceRenderer::class => ResourceRenderer::temp(),
            default => new $params['renderer_class'],
        };
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
     * @param array{rows: int, cols: int, renderer_class: class-string<Renderer>} $params
     */
    public function benchBuildingTable(array $params): void
    {
        $this->buildTable($params['rows'], $params['cols']);
    }

    /**
     * @param array{rows: int, cols: int, renderer_class: class-string<Renderer>} $params
     */
    public function benchRendering(array $params): void
    {
        if ($params['renderer_class'] === DirectOutputRenderer::class) {
            ob_start();
            $this->table->render($this->renderer);
            ob_end_clean();
            return;
        }

        $this->table->render($this->renderer);
    }

    /**
     * @param array{rows: int, cols: int, renderer_class: class-string<Renderer>} $params
     */
    public function benchBuildingTableAndRendering(array $params): void
    {
        $table = $this->buildTable($params['rows'], $params['cols']);

        if ($params['renderer_class'] === DirectOutputRenderer::class) {
            ob_start();
            $table->render($this->renderer);
            ob_end_clean();
            return;
        }

        $table->render($this->renderer);
    }
}
