<?php

use Berry\Html5\Elements\Button;
use Berry\Html5\BaseNode;
use Berry\Node;
use Berry\Renderable;
use Berry\TextNode;

use function Berry\Html5\b;
use function Berry\Html5\body;
use function Berry\Html5\button;
use function Berry\Html5\div;
use function Berry\Html5\footer;
use function Berry\Html5\h1;
use function Berry\Html5\h2;
use function Berry\Html5\h3;
use function Berry\Html5\head;
use function Berry\Html5\html;
use function Berry\Html5\img;
use function Berry\Html5\li;
use function Berry\Html5\title;
use function Berry\Html5\ul;
use function Berry\fragment;

test('Node render simple div example', function () {
    $res = div()
        ->class('card bg-base-200')
        ->child(null)
        ->child(div()->class('card-body')->text('Hello, World!'))
        ->toString();
    expect($res)->toBe('<div class="card bg-base-200"><div class="card-body">Hello, World!</div></div>');
});

test('Node render simple img example', function () {
    $res = img()->src('https://example.com/image.png')->toString();
    expect($res)->toBe('<img src="https://example.com/image.png" />');
});

test('Arbitrary attributes', function () {
    expect(div()->attr('my-cool-attribute', '1337')->toString())->toBe('<div my-cool-attribute="1337"></div>');
});

test('Arbitrary flags', function () {
    expect(div()->flag('my-cool-flag')->toString())->toBe('<div my-cool-flag></div>');
});

test('Rendering text', function () {
    expect(div()->text('<b>This should be escaped</b>')->toString())->toBe('<div>&lt;b&gt;This should be escaped&lt;/b&gt;</div>');
});

test('Rendering raw text', function () {
    expect(div()->raw('<b>This should not be escaped</b>')->toString())->toBe('<div><b>This should not be escaped</b></div>');
});

test('Add child func', function () {
    expect(
        div()->child(fn() => b()->text('Hello, World'))->toString()
    )->toBe('<div><b>Hello, World</b></div>');
});

test('Add text func', function () {
    expect(
        div()->child(b()->text(fn() => 'Hello, World'))->toString()
    )->toBe('<div><b>Hello, World</b></div>');
});

test('Add multiple texts', function () {
    expect(
        b()
            ->text('Hello')
            ->text(null)
            ->text(' ')
            ->text('World')
            ->toString()
    )->toBe('<b>Hello World</b>');
});

test('Add children conditionally', function () {
    expect(
        ul()
            ->childWhen(false, li()->text('This should not appear'))
            ->childWhen(fn() => false, li()->text('This should not appear either'))
            ->childWhen(true, li()->text('This should'))
            ->childWhen(fn() => true, li()->text('This should too'))
            ->toString()
    )->toBe('<ul><li>This should</li><li>This should too</li></ul>');
});

class IndexView
{
    public static function render(): Renderable
    {
        return html()
            ->lang('en')
            ->child(head()
                ->child(title()->text('Index Page')))
            ->child(body()
                ->child(
                    div()
                        ->class('container')
                        ->child(
                            h1()->text('Index Page')
                        )
                )
                ->child(
                    footer()->text('This is a footer')
                ));
    }
}

test('README.md example', function () {
    expect(IndexView::render()->toString())->toBe('<!DOCTYPE html><html lang="en"><head><title>Index Page</title></head><body><div class="container"><h1>Index Page</h1></div><footer>This is a footer</footer></body></html>');
});

test('Extension Methods', function () {
    Node::addMethod('hxPost', function (Node $node, mixed ...$args): Node {
        assert(count($args) === 1);
        $url = $args[0];
        assert(is_string($url));

        return $node->attr('hx-post', $url);
    });

    // @phpstan-ignore-next-line
    expect(button()->hxPost('https://example.com')->toString())->toBe('<button hx-post="https://example.com"></button>');

    Button::addMethod('greeter', function (Button $btn, mixed ...$args): Button {
        assert(count($args) === 1);
        $name = $args[0];
        assert(is_string($name));
        return $btn->attr('greet', $name);
    });

    // @phpstan-ignore-next-line
    expect(button()->greeter('Peter')->toString())->toBe('<button greet="Peter"></button>');

    // cuz this is only for button and children
    // @phpstan-ignore-next-line
    expect(fn() => div()->greeter('Peter')->toString())->toThrow(BadMethodCallException::class);

    BaseNode::addMethod('hxSwap', function (BaseNode $node, mixed ...$args): BaseNode {
        assert(count($args) === 1);
        $first = $args[0];
        assert(is_string($first));

        return $node->attr('hx-swap', $first);
    });

    // @phpstan-ignore-next-line
    expect(button()->hxSwap('outerHTML')->toString())->toBe('<button hx-swap="outerHTML"></button>');

    // @phpstan-ignore-next-line
    expect(fn() => html()->hxSwap('outerHTML')->toString())->toThrow(BadMethodCallException::class);
});

test('Array representation of elements', function () {
    expect(
        button()
            ->id('the-button')
            ->class('btn btn-primary')
            ->text('Hello, World')
            ->toArray()
    )->toBe([
        Button::class, [
            'id' => 'the-button',
            'class' => 'btn btn-primary'
        ],
        [
            [
                TextNode::class,
                ['content' => 'Hello, World', 'raw' => false],
                []
            ],
        ]
    ]);
});

test('fragment nodes', function () {
    $res = fragment(
        h1()->text('#1'),
        h2()->text('#2'),
        h3()->text('#3'),
    )->toString();

    expect($res)->toBe('<h1>#1</h1><h2>#2</h2><h3>#3</h3>');
});
