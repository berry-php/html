<?php

declare(strict_types=1);

use function Berry\Xml\xmlElement;
use function Berry\Xml\xmlRoot;

test('it can generate an rss feed', function () {
    $rss = xmlRoot('rss')
        ->attr('version', '2.0')
        ->child(
            xmlElement('channel')
                ->child(xmlElement('title')->text('Berry Blog'))
                ->child(xmlElement('link')->text('https://berry-html.dev'))
                ->child(xmlElement('description')->text('The official Berry blog'))
                ->child(
                    xmlElement('item')
                        ->child(xmlElement('title')->text('Hello World'))
                        ->child(xmlElement('link')->text('https://berry-html.dev/hello-world'))
                        ->child(xmlElement('guid')->text('https://berry-html.dev/hello-world'))
                        ->child(xmlElement('pubDate')->text('Mon, 06 Sep 2010 00:01:00 +0000')),
                ),
        );

    expect($rss->toString())
        ->toBe(
            '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel><title>Berry Blog</title><link>https://berry-html.dev</link><description>The official Berry blog</description><item><title>Hello World</title><link>https://berry-html.dev/hello-world</link><guid>https://berry-html.dev/hello-world</guid><pubDate>Mon, 06 Sep 2010 00:01:00 +0000</pubDate></item></channel></rss>',
        );
});
