<?php declare(strict_types=1);

use Berry\Html\Elements\Button;
use Berry\Html\HtmlTag;
use Berry\AbstractTag;

use function Berry\Html\button;
use function Berry\Html\div;
use function Berry\Html\link;

test('Extension Methods', function () {
    AbstractTag::addMethod('hxPost', function (AbstractTag $node, mixed ...$args): AbstractTag {
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

    HtmlTag::addMethod('hxSwap', function (HtmlTag $node, mixed ...$args): HtmlTag {
        assert(count($args) === 1);
        $first = $args[0];
        assert(is_string($first));

        return $node->attr('hx-swap', $first);
    });

    // @phpstan-ignore-next-line
    expect(button()->hxSwap('outerHTML')->toString())->toBe('<button hx-swap="outerHTML"></button>');

    // @phpstan-ignore-next-line
    expect(fn() => link()->hxSwap('outerHTML')->toString())->toThrow(BadMethodCallException::class);
});
