<?php

declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Generator;
use PhpBench\Attributes as Bench;

use function Berry\Html\div;

#[Bench\BeforeMethods('setUp')]
#[Bench\ParamProviders(['provideCounts'])]
#[Bench\Revs(100)]
#[Bench\Iterations(3)]
#[Bench\Warmup(200)]
final class ClassAttributeBench
{
    /** @var list<string> */
    private array $classes = [];

    /** @return Generator<string, array{classes: int}> */
    public function provideCounts(): Generator
    {
        yield 'typical' => ['classes' => 5];
        yield 'utility-heavy' => ['classes' => 20];
        yield 'stress' => ['classes' => 4000];
    }

    /** @param array{classes: int} $params */
    public function setUp(array $params): void
    {
        $this->classes = [];
        for ($i = 0; $i < $params['classes']; $i++) {
            $this->classes[] = " class-{$i} ";
        }
    }

    public function benchRepeatedCalls(): void
    {
        $div = div();
        foreach ($this->classes as $class) {
            $div->class($class);
        }
        $div->toString();
    }

    public function benchSingleCall(): void
    {
        div()->class($this->classes)->toString();
    }
}
