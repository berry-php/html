<?php declare(strict_types=1);

use function Berry\Html\script;

test('script renders src async', function () {
    expect(script()->src('js')->async()->toString())->toBe('<script src="js" async></script>');
});
