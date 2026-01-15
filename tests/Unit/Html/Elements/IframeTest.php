<?php declare(strict_types=1);

use function Berry\Html\iframe;
use Berry\Html\Enums\ReferrerPolicy;

test('iframe renders basic', function () {
    expect(iframe()->toString())->toBe('<iframe></iframe>');
});

test('iframe with attributes', function () {
    expect(iframe()->src('https://example.com')->width(320)->height(240)->referrerpolicy(ReferrerPolicy::NoReferrer)->toString())
        ->toBe('<iframe src="https://example.com" width="320" height="240" referrerpolicy="no-referrer"></iframe>');
});