<?php declare(strict_types=1);

use function Berry\Html5\div;
use function Berry\text;
use function Berry\unsafeRawText;

test('test if inspector can render', function () {
    $elem = div()->text('Hello, World!');
    $res1 = $elem->toString();
    $res2 = $elem->dump(true)->toString();

    expect(strlen($res2))->toBeGreaterThan(strlen($res1));
});

test('test if InspectorProps are generated correctly', function () {
    $res = div()->child(text('Hello Safe'))->child(unsafeRawText('Hello Unsafe'))->dump(true)->toString();

    expect($res)->toContain('Berry\Text');
    expect($res)->toContain('<div class="berry-debug-leaf"><span class="berry-debug-key">content:</span><span class="berry-debug-string">&quot;Hello Safe&quot;</span></div>');
    expect($res)->toContain('Berry\UnsafeRawText');
    expect($res)->toContain('<div class="berry-debug-leaf"><span class="berry-debug-key">content:</span><span class="berry-debug-string">&quot;Hello Unsafe&quot;</span></div>');
});
