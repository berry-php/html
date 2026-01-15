<?php declare(strict_types=1);

use function Berry\Html\time;

 test('time renders basic', function () {
     expect(time()->toString())->toBe('<time></time>');
 });
 
 test('time renders with datetime', function () {
     expect(time()->datetime('2020-01-01')->toString())->toBe('<time datetime="2020-01-01"></time>');
 });