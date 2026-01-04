<?php declare(strict_types=1);

use Berry\Element;
use Berry\Layout;

use function Berry\Html5\body;
use function Berry\Html5\h1;
use function Berry\Html5\h2;
use function Berry\Html5\head;
use function Berry\Html5\html;
use function Berry\Html5\main;
use function Berry\Html5\p;
use function Berry\Html5\title;

class RootLayout extends Layout
{
    public function __construct(
        private string $title
    ) {}

    public function renderComponent(): Element
    {
        return html()
            ->child(
                head()
                    ->child(
                        title()->text($this->title)
                    )
            )
            ->child(
                body()
                    ->child(h1()->text('Hello from Root Layout!'))
                    ->child($this->renderSlot('content'))
            );
    }
}

test('test layout', function () {
    $content = p()->text('Hello Content!');

    $page = (new RootLayout('Root!'))
        ->slot('content', $content);

    expect($page->toString())->toBe('<!DOCTYPE html><html><head><title>Root!</title></head><body><h1>Hello from Root Layout!</h1><p>Hello Content!</p></body></html>');
});

class AppLayout extends Layout
{
    public function __construct(
        private string $title
    ) {}

    public function renderComponent(): Element
    {
        return (new RootLayout($this->title))->slot(
            'content',
            main()
                ->child(h2()->text('Hello from App Layout!'))
                ->child($this->renderSlot('content')),
        );
    }
}

test('test layout in layout', function () {
    $content = p()->text('Hello Content!');

    $page = (new AppLayout('App!'))
        ->slot('content', $content);

    expect($page->toString())->toBe('<!DOCTYPE html><html><head><title>App!</title></head><body><h1>Hello from Root Layout!</h1><main><h2>Hello from App Layout!</h2><p>Hello Content!</p></main></body></html>');
});
