<?php declare(strict_types=1);

use Berry\Html5\Enums\FormMethod;

use function Berry\Html5\form;

test('form renders with action method', function () {
    expect(form()->action('/')->method(FormMethod::Post)->toString())->toBe('<form action="/" method="POST"></form>');
});
