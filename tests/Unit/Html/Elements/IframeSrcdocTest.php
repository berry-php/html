<?php declare(strict_types=1);

use function Berry\Html\iframe;

test('iframe srcdoc renders escaped content', function () {
    $html = iframe()->srcdoc('<p>Hi</p>')->toString();
    expect($html)->toBe('<iframe srcdoc="&lt;p&gt;Hi&lt;/p&gt;"></iframe>');
});