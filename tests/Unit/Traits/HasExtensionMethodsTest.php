<?php

declare(strict_types=1);

use Berry\Html\Elements\Button;
use Berry\Html\HtmlTag;
use Berry\AbstractTag;

use function Berry\Html\button;
use function Berry\Html\div;
use function Berry\Html\link;

test('Extension Methods', function () {
    AbstractTag::addMethod('hxPost', function (AbstractTag $node, mixed ...$args): AbstractTag {
        assert(count($args) === 1);
        assert(is_string($args[0]));
        $url = $args[0];

        return $node->attr('hx-post', $url);
    });

    // Runtime extension methods intentionally have no static declarations.
    // @mago-expect analysis:non-documented-method,mixed-method-access
    // @phpstan-ignore-next-line
    expect(button()->hxPost('https://example.com')->toString())
        ->toBe('<button hx-post="https://example.com"></button>');

    Button::addMethod('greeter', function (Button $btn, mixed ...$args): Button {
        assert(count($args) === 1);
        assert(is_string($args[0]));
        $name = $args[0];
        return $btn->attr('greet', $name);
    });

    // @mago-expect analysis:non-documented-method,mixed-method-access
    // @phpstan-ignore-next-line
    expect(button()->greeter('Peter')->toString())->toBe('<button greet="Peter"></button>');

    // cuz this is only for button and children
    // @mago-expect analysis:non-documented-method,mixed-method-access
    // @phpstan-ignore-next-line
    expect(fn() => div()->greeter('Peter')->toString())->toThrow(BadMethodCallException::class);

    HtmlTag::addMethod('hxSwap', function (HtmlTag $node, mixed ...$args): HtmlTag {
        assert(count($args) === 1);
        assert(is_string($args[0]));
        $first = $args[0];

        return $node->attr('hx-swap', $first);
    });

    // @mago-expect analysis:non-documented-method,mixed-method-access
    // @phpstan-ignore-next-line
    expect(button()->hxSwap('outerHTML')->toString())->toBe('<button hx-swap="outerHTML"></button>');

    // @mago-expect analysis:non-documented-method,mixed-method-access
    // @phpstan-ignore-next-line
    expect(fn() => link()->hxSwap('outerHTML')->toString())->toThrow(BadMethodCallException::class);
});

test('Extension Method returning something else', function () {
    AbstractTag::addMethod('strlen', fn(AbstractTag $tag): int => strlen($tag->toString()));

    // @mago-expect analysis:non-documented-method
    // @phpstan-ignore-next-line
    expect(div()->text('Hello, World!')->strlen())->toBe(strlen('<div>Hello, World!</div>'));
});
