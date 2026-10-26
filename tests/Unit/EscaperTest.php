<?php

declare(strict_types=1);

use Berry\Escaper;

test('escaping uses UTF-8 independently of the PHP default charset', function () {
    $charset = ini_get('default_charset');
    assert(is_string($charset));
    try {
        // Deliberately vary the charset to verify escaping is independent of global configuration.
        // @mago-expect lint:no-ini-set
        ini_set('default_charset', 'ISO-8859-1');
        expect(Escaper::escape("Grüße\xFF"))->toBe("Grüße\u{FFFD}");
        expect(Escaper::escapeXml("Grüße\xFF"))->toBe("Grüße\u{FFFD}");
    } finally {
        // Restore configuration even if an assertion fails.
        // @mago-expect lint:no-ini-set
        ini_set('default_charset', $charset);
    }
});

test('XML names support the XML 1.0 name character ranges', function () {
    foreach (['item', 'xml:lang', '_name', 'Étiquette', "a\u{0301}", "\u{10000}name", 'item-1.2'] as $name) {
        expect(Escaper::xmlName($name))->toBe($name);
    }
});
