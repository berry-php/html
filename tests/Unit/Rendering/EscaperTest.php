<?php declare(strict_types=1);

use function Berry\Html5\button;
use function Berry\Html5\div;

test('Attribute Escaper should not escape typical alpine.js attributes', function () {
    expect(button()->attr('@click', "alert('Hello World!')")->text('Click Me')->toString())->toBe('<button @click="alert(&#039;Hello World!&#039;)">Click Me</button>');
    expect(div()->attr('x-alert.after.500ms', 'yay')->toString())->toBe('<div x-alert.after.500ms="yay"></div>');
});
