<?php declare(strict_types=1);

use Berry\Html5\Enums\AriaRole;

use function Berry\Html5\div;

test('it renders aria role using string or enum', function () {
    $res1 = div()->role('button')->toString();
    expect($res1)->toBe('<div role="button"></div>');

    $res2 = div()->role(AriaRole::Button)->toString();
    expect($res2)->toBe('<div role="button"></div>');
});

test('it converts boolean aria attributes to string true/false', function () {
    $res = div()
        ->ariaHidden(true)
        ->ariaExpanded(false)
        ->ariaDisabled()
        ->ariaAtomic(true)
        ->ariaBusy(false)
        ->ariaRequired()
        ->toString();

    expect($res)->toBe('<div aria-hidden="true" aria-expanded="false" aria-disabled="true" aria-atomic="true" aria-busy="false" aria-required="true"></div>');
});

test('it handles mixed aria-checked and aria-pressed states', function () {
    expect(div()->ariaChecked(true)->toString())->toBe('<div aria-checked="true"></div>');
    expect(div()->ariaPressed(false)->toString())->toBe('<div aria-pressed="false"></div>');
    expect(div()->ariaChecked('mixed')->toString())->toBe('<div aria-checked="mixed"></div>');
});

test('it renders relationship and labeling attributes', function () {
    $res = div()
        ->ariaLabel('Close')
        ->ariaLabelledBy('title-id')
        ->ariaDescribedby('desc-id')
        ->ariaControls('menu-id')
        ->ariaOwns('child-id')
        ->ariaFlowTo('next-section')
        ->toString();

    expect($res)->toBe('<div aria-label="Close" aria-labelledby="title-id" aria-describedby="desc-id" aria-controls="menu-id" aria-owns="child-id" aria-flowto="next-section"></div>');
});

test('it renders numeric aria attributes as strings', function () {
    $res = div()
        ->ariaPosInSet(3)
        ->ariaSetSize(10)
        ->ariaValueNow(50)
        ->ariaValueMin(0)
        ->ariaValueMax(100)
        ->toString();

    expect($res)->toBe('<div aria-posinset="3" aria-setsize="10" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>');
});

test('it handles live regions and autocomplete', function () {
    $res = div()
        ->ariaLive('polite')
        ->ariaRelevant('additions text')
        ->ariaAutocomplete('list')
        ->toString();

    expect($res)->toBe('<div aria-live="polite" aria-relevant="additions text" aria-autocomplete="list"></div>');
});

test('it handles aria-invalid with mixed types', function () {
    expect(div()->ariaInvalid(true)->toString())->toBe('<div aria-invalid="true"></div>');
    expect(div()->ariaInvalid('grammar')->toString())->toBe('<div aria-invalid="grammar"></div>');
});
