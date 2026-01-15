<?php declare(strict_types=1);

use Berry\Html\Enums\AutoCapitalize;
use Berry\Html\Enums\Direction;
use Berry\Html\Enums\InputMode;
use function Berry\Html\div;

test('Data attributes', function () {
    $res = div()->id('my-div')->data('elem-id', 42)->toString();
    expect($res)->toBe('<div id="my-div" data-elem-id="42"></div>');
});

test('it renders basic string attributes', function () {
    $res = div()
        ->accesskey('s')
        ->lang('en')
        ->title('Hello World')
        ->autocapitalize(AutoCapitalize::Words)
        ->toString();

    expect($res)->toBe('<div accesskey="s" lang="en" title="Hello World" autocapitalize="words"></div>');
});

test('it renders boolean flag attributes', function () {
    $res = div()
        ->draggable()
        ->spellcheck()
        ->autofocus()
        ->contenteditable()
        ->hidden()
        ->toString();

    expect($res)->toBe('<div draggable spellcheck autofocus contenteditable hidden></div>');
});

test('it renders tabindex correctly casting int to string', function () {
    $res = div()->tabindex(1)->toString();

    expect($res)->toBe('<div tabindex="1"></div>');
});

test('it handles multiple attributes in a fluent chain', function () {
    $res = div()
        ->id('main')
        ->lang('fr')
        ->tabindex(-1)
        ->hidden()
        ->toString();

    expect($res)->toBe('<div id="main" lang="fr" tabindex="-1" hidden></div>');
});

test('it supports space-separated values in accesskey', function () {
    $res = div()->accesskey('a s d')->toString();

    expect($res)->toBe('<div accesskey="a s d"></div>');
});

test('it renders new global attributes', function () {
    $res = div()
        ->dir(Direction::Rtl)
        ->inputmode(InputMode::Numeric)
        ->enterkeyhint('next')
        ->is('custom-div')
        ->nonce('secret')
        ->part('thumb')
        ->slot('header')
        ->toString();

    expect($res)->toBe('<div dir="rtl" inputmode="numeric" enterkeyhint="next" is="custom-div" nonce="secret" part="thumb" slot="header"></div>');
});

test('it renders microdata attributes', function () {
    $res = div()
        ->itemprop('name')
        ->itemscope()
        ->itemtype('https://schema.org/Person')
        ->itemid('123')
        ->itemref('other-id')
        ->toString();

    expect($res)->toBe('<div itemprop="name" itemscope itemtype="https://schema.org/Person" itemid="123" itemref="other-id"></div>');
});
