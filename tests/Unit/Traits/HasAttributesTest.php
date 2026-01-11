<?php declare(strict_types=1);

use function Berry\Html5\div;

test('add arbitrary attributes', function () {
    expect(div()->attr('my-cool-attribute', '1337')->toString())->toBe('<div my-cool-attribute="1337"></div>');
});

test('add arbitrary flags', function () {
    expect(div()->flag('my-cool-flag')->toString())->toBe('<div my-cool-flag></div>');
});

test('escapes script tags in attribute values', function () {
    $payload = '"><script>alert("xss")</script>';
    expect(div()->attr('data-info', $payload)->toString())
        ->toContain('data-info="&quot;&gt;&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;"');
});

test('prevents attribute breakout via double quotes', function () {
    $payload = 'default" onmouseover="alert(1)';
    $html = div()->attr('class', $payload)->toString();

    expect($html)->not->toContain('onmouseover="alert(1)"');
    expect($html)->toBe('<div class="default&quot; onmouseover=&quot;alert(1)"></div>');
});

test('prevents injection via attribute names', function () {
    $maliciousKey = 'class="test" onmouseover';
    $html = div()->attr($maliciousKey, 'alert(1)')->toString();
    expect($html)->not->toContain(' onmouseover="alert(1)"');
});

test('handles javascript protocol strings', function () {
    $payload = 'javascript:alert(1)';
    $html = div()->attr('onclick', $payload)->toString();
    expect($html)->toBe('<div onclick="javascript:alert(1)"></div>');
});

test('handles null bytes gracefully', function () {
    $payload = "image.jpg\0.php";
    $html = div()->attr('src', $payload)->toString();
    expect($html)->not->toContain("\0");
});

test('it handles non-string keys safely', function () {
    $html = div()->attr('1337', 'numeric-key')->toString();

    expect($html)->toBe('<div 1337="numeric-key"></div>');
});

test('it handles extremely malformed keys that might return null/array from regex', function () {
    $html = div()->attr('!!!@@@###', 'symbols')->toString();

    // Should result in an empty string and be skipped
    expect($html)->toBe('<div></div>');
});
