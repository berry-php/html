<?php

declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Element;
use Berry\Escaper;
use Generator;
use PhpBench\Attributes as Bench;

use function Berry\Html\li;
use function Berry\Html\ul;

#[Bench\ParamProviders(['provideCounts'])]
#[Bench\Revs(10)]
#[Bench\Iterations(3)]
#[Bench\Warmup(20)]
final class ChildrenBench
{
    private Element $list;

    /** @return Generator<string, array{children: int}> */
    public function provideCounts(): Generator
    {
        yield 'small' => ['children' => 10];
        yield 'page' => ['children' => 1000];
        yield 'large' => ['children' => 30_000];
    }

    /** @return Generator<int, Element> */
    private function children(int $count): Generator
    {
        for ($i = 0; $i < $count; $i++) {
            yield li()->text("Item {$i} <tag> & \"quoted\"");
        }
    }

    /** @param array{children: int} $params */
    public function benchArrayChildren(array $params): void
    {
        ul()->children(iterator_to_array($this->children($params['children']), false))->toString();
    }

    /** @param array{children: int} $params */
    public function benchGeneratorChildren(array $params): void
    {
        ul()->children($this->children($params['children']))->toString();
    }

    /** @param array{children: int} $params */
    public function benchIncrementalChildren(array $params): void
    {
        $list = ul();
        foreach ($this->children($params['children']) as $child) {
            $list->child($child);
        }
        $list->toString();
    }

    /** @param array{children: int} $params */
    public function setUpList(array $params): void
    {
        $this->list = ul()->children($this->children($params['children']));
    }

    /** @param array{children: int} $params */
    #[Bench\BeforeMethods('setUpList')]
    #[Bench\Revs(100)]
    #[Bench\Warmup(200)]
    public function benchSerializePrebuiltList(array $params): void
    {
        $this->list->toString();
    }

    /** @param array{children: int} $params */
    public function benchPhpStringConcat(array $params): void
    {
        $out = '<ul>';
        for ($i = 0; $i < $params['children']; $i++) {
            $out .= '<li>' . Escaper::escape("Item {$i} <tag> & \"quoted\"") . '</li>';
        }
        $out .= '</ul>';
    }
}
