<?php declare(strict_types=1);

use Berry\Html\Enums\Wrap;
use function Berry\Html\textarea;

test('textarea renders value rows', function () {
    expect(textarea()->text('Text')->rows(5)->toString())->toBe('<textarea rows="5">Text</textarea>');
});

test('textarea renders extended attributes', function () {
    $res = textarea()
        ->cols(10)
        ->autocomplete(true)
        ->disabled()
        ->form('f')
        ->maxlength(100)
        ->minlength(1)
        ->placeholder('p')
        ->readonly()
        ->required()
        ->wrap(Wrap::Hard)
        ->toString();

    expect($res)->toBe('<textarea cols="10" autocomplete="on" disabled form="f" maxlength="100" minlength="1" placeholder="p" readonly required wrap="hard"></textarea>');
});
