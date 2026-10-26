<?php

declare(strict_types=1);

use Berry\Html\Enums\TrackKind;

use function Berry\Html\div;
use function Berry\Html\img;
use function Berry\Html\picture;
use function Berry\Html\source;
use function Berry\Html\template;
use function Berry\Html\track;
use function Berry\Html\video;

test('picture composes responsive sources and a fallback image', function () {
    expect(
        picture()
            ->class('responsive')
            ->child(
                source()
                    ->type('image/avif')
                    ->srcset('/large.avif 2x, /small.avif 1x')
                    ->sizes('100vw')
                    ->media('(min-width: 600px)')
                    ->width(800)
                    ->height(600),
            )
            ->child(img()->src('/fallback.jpg')->alt('A & B'))
            ->toString(),
    )
        ->toBe(
            '<picture class="responsive"><source type="image/avif" srcset="/large.avif 2x, /small.avif 1x" sizes="100vw" media="(min-width: 600px)" width="800" height="600" /><img src="/fallback.jpg" alt="A &amp; B" /></picture>',
        );
});

test('video accepts media sources and timed text tracks', function () {
    expect(
        video()
            ->child(source()->src('/movie.mp4')->type('video/mp4'))
            ->child(
                track()->kind(TrackKind::Captions)->src('/captions.vtt')->srclang('en')->label('English')->default(),
            )
            ->toString(),
    )
        ->toBe(
            '<video><source src="/movie.mp4" type="video/mp4" /><track kind="captions" src="/captions.vtt" srclang="en" label="English" default /></video>',
        );
});

test('track supports string kinds escaped values and false default', function () {
    expect(track()->kind('metadata')->src('/track?a=1&b=2')->label('A "label"')->default(false)->toString())
        ->toBe('<track kind="metadata" src="/track?a=1&amp;b=2" label="A &quot;label&quot;" />');
});

test('template renders inert content and declarative shadow DOM attributes', function () {
    expect(template()->id('card')->child(div()->text('A < B'))->toString())
        ->toBe('<template id="card"><div>A &lt; B</div></template>');
    expect(template()->shadowrootmode('open')->shadowrootdelegatesfocus()->toString())
        ->toBe('<template shadowrootmode="open" shadowrootdelegatesfocus></template>');
    expect(template()->shadowrootdelegatesfocus(false)->toString())->toBe('<template></template>');
});
