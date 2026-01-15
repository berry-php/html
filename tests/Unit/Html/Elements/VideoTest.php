<?php declare(strict_types=1);

use Berry\Html\Enums\Crossorigin;
use Berry\Html\Enums\Preload;
use function Berry\Html\video;

test('video renders basic', function () {
    expect(video()->toString())->toBe('<video></video>');
});

test('video with src', function () {
    expect(video()->src('movie.mp4')->toString())->toBe('<video src="movie.mp4"></video>');
});

test('video with controls', function () {
    expect(video()->controls()->toString())->toBe('<video controls></video>');
});

test('video with dimensions', function () {
    expect(video()->width(640)->height(480)->toString())->toBe('<video width="640" height="480"></video>');
});

test('video with all attributes', function () {
    $result = video()
        ->src('movie.mp4')
        ->controls()
        ->autoplay()
        ->loop()
        ->muted()
        ->width(640)
        ->height(480)
        ->poster('poster.jpg')
        ->preload(Preload::Metadata)
        ->crossorigin(Crossorigin::Anonymous)
        ->toString();

    expect($result)->toBe('<video src="movie.mp4" controls autoplay loop muted width="640" height="480" poster="poster.jpg" preload="metadata" crossorigin="anonymous"></video>');
});