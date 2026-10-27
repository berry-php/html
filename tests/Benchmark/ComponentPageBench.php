<?php

declare(strict_types=1);

namespace Berry\Tests\Benchmark;

use Berry\Element;
use Generator;
use PhpBench\Attributes as Bench;

use function Berry\Html\a;
use function Berry\Html\article;
use function Berry\Html\body;
use function Berry\Html\div;
use function Berry\Html\h1;
use function Berry\Html\h2;
use function Berry\Html\head;
use function Berry\Html\html;
use function Berry\Html\main;
use function Berry\Html\p;
use function Berry\Html\script;
use function Berry\Html\title;

#[Bench\ParamProviders(['provideCounts'])]
#[Bench\Revs(20)]
#[Bench\Iterations(3)]
#[Bench\Warmup(200)]
final class ComponentPageBench
{
    private Element $page;

    /** @return Generator<string, array{cards: int}> */
    public function provideCounts(): Generator
    {
        yield 'page' => ['cards' => 12];
        yield 'long-page' => ['cards' => 100];
    }

    private function card(int $index): Element
    {
        return article()
            ->class('card')
            ->classWhen(($index % 2) === 0, 'featured')
            ->data('id', $index)
            ->style(['padding' => '1rem'])
            ->child(h2()->text("Product {$index} & accessories"))
            ->child(p()->text('A <useful> product with "quoted" details.'))
            ->child(a()->href("/products/{$index}?from=list&sort=name")->text('View product'));
    }

    /** @return Generator<int, Element> */
    private function cards(int $count): Generator
    {
        for ($i = 0; $i < $count; $i++) {
            yield $this->card($i);
        }
    }

    private function buildPage(int $cards): Element
    {
        return html()
            ->lang('en')
            ->child(head()->child(title()->text('Products & accessories')))
            ->child(
                body()
                    ->child(
                        main()
                            ->class('container')
                            ->child(h1()->text('Products'))
                            ->child(div()->class('grid')->children($this->cards($cards))),
                    )
                    ->child(script()->id('page-data')->json(['cards' => $cards])),
            );
    }

    /** @param array{cards: int} $params */
    public function benchBuildPage(array $params): void
    {
        $this->buildPage($params['cards']);
    }

    /** @param array{cards: int} $params */
    public function benchBuildAndRenderPage(array $params): void
    {
        $this->buildPage($params['cards'])->toString();
    }

    /** @param array{cards: int} $params */
    public function setUpPage(array $params): void
    {
        $this->page = $this->buildPage($params['cards']);
    }

    /** @param array{cards: int} $_params */
    #[Bench\BeforeMethods('setUpPage')]
    #[Bench\Revs(100)]
    public function benchSerializePrebuiltPage(array $_params): void
    {
        $this->page->toString();
    }
}
