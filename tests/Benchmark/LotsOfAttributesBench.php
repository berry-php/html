<?php

declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Escaper;
use Generator;

use function Berry\Html\div;

/**
 * @BeforeMethods({"setUp"})
 * @ParamProviders({"provideAttributeCounts"})
 * @Revs(10)
 * @Iterations(3)
 * @Warmup(20)
 */
final class LotsOfAttributesBench
{
    /** @var array<string, string> */
    private array $attributes = [];

    /** @return Generator<string, array{attributes: int}> */
    public function provideAttributeCounts(): Generator
    {
        yield 'typical' => ['attributes' => 8];
        yield 'attribute-heavy' => ['attributes' => 32];
        yield 'stress' => ['attributes' => 500_000];
    }

    /** @param array{attributes: int} $params */
    public function setUp(array $params): void
    {
        $this->attributes = [];
        for ($i = 0; $i < $params['attributes']; $i++) {
            $this->attributes["attr-{$i}"] = "value-{$i} & \"quoted\"";
        }
    }

    public function benchCreateElement(): void
    {
        $div = div();

        foreach ($this->attributes as $key => $value) {
            $div->attr($key, $value);
        }

        $div->toString();
    }

    public function benchPhpCreateElement(): void
    {
        $div = '<div';

        foreach ($this->attributes as $key => $value) {
            $key = Escaper::escapeAttributeName($key);
            $value = Escaper::escape($value);

            $div .= " {$key}=\"{$value}\"";
        }

        $div .= '></div>';
    }
}
