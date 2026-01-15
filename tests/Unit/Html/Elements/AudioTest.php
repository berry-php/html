<?php declare(strict_types=1);

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\Preload;
use function Berry\Html\audio;

test('audio renders basic', function () {
    expect(audio()->toString())->toBe('<audio></audio>');
});

test('audio with src', function () {
    expect(audio()->src('sound.mp3')->toString())->toBe('<audio src="sound.mp3"></audio>');
});

test('audio with controls', function () {
    expect(audio()->controls()->toString())->toBe('<audio controls></audio>');
});

test('audio with all attributes', function () {
    $result = audio()
        ->src('sound.mp3')
        ->controls()
        ->autoplay()
        ->loop()
        ->muted()
        ->preload(Preload::Metadata)
        ->crossorigin(Crossorigin::Anonymous)
        ->toString();

    expect($result)->toBe('<audio src="sound.mp3" controls autoplay loop muted preload="metadata" crossorigin="anonymous"></audio>');
});