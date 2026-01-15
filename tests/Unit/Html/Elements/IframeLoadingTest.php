<?php declare(strict_types=1);

use Berry\Html\Enums\Loading;
use function Berry\Html\iframe;

 test('iframe loading attribute', function () {
     expect(iframe()->loading(Loading::Lazy)->toString())->toBe('<iframe loading="lazy"></iframe>');
 });