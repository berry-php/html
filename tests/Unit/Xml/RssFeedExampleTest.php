<?php declare(strict_types=1);

use function Berry\Xml\element;
use function Berry\Xml\root;

test('it can generate an rss feed', function () {
    $rss = root('rss')
        ->attr('version', '2.0')
        ->child(
            element('channel')
                ->child(element('title')->text('Berry Blog'))
                ->child(element('link')->text('https://berry-html.dev'))
                ->child(element('description')->text('The official Berry blog'))
                ->child(
                    element('item')
                        ->child(element('title')->text('Hello World'))
                        ->child(element('link')->text('https://berry-html.dev/hello-world'))
                        ->child(element('guid')->text('https://berry-html.dev/hello-world'))
                        ->child(element('pubDate')->text('Mon, 06 Sep 2010 00:01:00 +0000'))
                )
        );

    expect($rss->toString())->toBe(
        '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel><title>Berry Blog</title><link>https://berry-html.dev</link><description>The official Berry blog</description><item><title>Hello World</title><link>https://berry-html.dev/hello-world</link><guid>https://berry-html.dev/hello-world</guid><pubDate>Mon, 06 Sep 2010 00:01:00 +0000</pubDate></item></channel></rss>'
    );
});
