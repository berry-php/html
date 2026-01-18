<?php declare(strict_types=1);

use function Berry\Xml\element;
use function Berry\Xml\root;

test('xml element renders correctly', function () {
    expect(element('foo')->toString())->toBe('<foo></foo>');
});

test('xml element with attributes renders correctly', function () {
    expect(element('foo')->attr('bar', 'baz')->toString())->toBe('<foo bar="baz"></foo>');
});

test('xml element with children renders correctly', function () {
    expect(element('foo')->child(element('bar'))->toString())->toBe('<foo><bar></bar></foo>');
});

test('xml root element renders with declaration', function () {
    expect(root('foo')->toString())->toBe('<?xml version="1.0" encoding="UTF-8"?><foo></foo>');
});

test('xml root element with children renders correctly', function () {
    expect(root('foo')->child(element('bar'))->toString())->toBe('<?xml version="1.0" encoding="UTF-8"?><foo><bar></bar></foo>');
});
