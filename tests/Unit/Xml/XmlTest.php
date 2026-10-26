<?php

declare(strict_types=1);

use function Berry\Xml\xmlElement;
use function Berry\Xml\xmlRoot;

test('xml element renders correctly', function () {
    expect(xmlElement('foo')->toString())->toBe('<foo></foo>');
});

test('xml element with attributes renders correctly', function () {
    expect(xmlElement('foo')->attr('bar', 'baz')->toString())->toBe('<foo bar="baz"></foo>');
});

test('xml element with children renders correctly', function () {
    expect(xmlElement('foo')->child(xmlElement('bar'))->toString())->toBe('<foo><bar></bar></foo>');
});

test('xml root element renders with declaration', function () {
    expect(xmlRoot('foo')->toString())->toBe('<?xml version="1.0" encoding="UTF-8"?><foo></foo>');
});

test('xml root element with children renders correctly', function () {
    expect(xmlRoot('foo')->child(xmlElement('bar'))->toString())
        ->toBe('<?xml version="1.0" encoding="UTF-8"?><foo><bar></bar></foo>');
});

test('XML preserves attribute case and namespace prefixes', function () {
    $xml = xmlRoot('Item')->attr('myAttr', 'value')->attr('xml:lang', 'en')->attr('Étiquette', 'oui')->toString();
    expect($xml)->toContain('<Item myAttr="value" xml:lang="en" Étiquette="oui">');
    $doc = new DOMDocument();
    expect($doc->loadXML($xml))->toBeTrue();
    expect($doc->documentElement?->getAttribute('myAttr'))->toBe('value');
});

test('XML flags serialize as valid attributes', function () {
    $xml = xmlElement('item')->flag('isEnabled')->toString();
    expect($xml)->toBe('<item isEnabled="true"></item>');
    expect((new DOMDocument())->loadXML($xml))->toBeTrue();
});

test('XML replaces forbidden characters and malformed UTF-8 in text and attributes', function () {
    $xml = xmlRoot('item')
        ->attr('value', "a\x01\0\xFFb")
        ->text(fn() => "c\x02\xFFd")
        ->toString();
    $doc = new DOMDocument();
    expect($doc->loadXML($xml))->toBeTrue();
    expect($doc->documentElement?->getAttribute('value'))->toBe("a\u{FFFD}\u{FFFD}\u{FFFD}b");
    expect($doc->documentElement?->textContent)->toBe("c\u{FFFD}\u{FFFD}d");
});

test('XML text supports null closures scalar values and Stringable', function () {
    expect(
        xmlElement('item')
            ->text(null)
            ->text(fn() => null)
            ->text(42)
            ->text(Berry\text('ok'))
            ->toString(),
    )
        ->toBe('<item>42ok</item>');
});

test('XML rejects invalid element and attribute names', function () {
    foreach (['', '1item', 'item name', 'a"b', "bad\0name", "bad\xFF"] as $name) {
        expect(fn() => xmlElement($name))->toThrow(InvalidArgumentException::class);
        expect(fn() => xmlElement('item')->attr($name, 'value'))->toThrow(InvalidArgumentException::class);
        expect(fn() => xmlElement('item')->flag($name))->toThrow(InvalidArgumentException::class);
    }
});

test('explicit unsafe XML escape bypasses remain available', function () {
    expect(xmlElement('item')->attr('myAttr', '&custom;', escapeValue: false)->unsafeRaw('<child />')->toString())
        ->toBe('<item myAttr="&custom;"><child /></item>');
});
