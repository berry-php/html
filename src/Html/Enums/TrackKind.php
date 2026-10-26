<?php

declare(strict_types=1);

namespace Berry\Html\Enums;

enum TrackKind: string
{
    case Subtitles = 'subtitles';
    case Captions = 'captions';
    case Descriptions = 'descriptions';
    case Chapters = 'chapters';
    case Metadata = 'metadata';
}
