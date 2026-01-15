<?php declare(strict_types=1);

namespace Berry\Html\Enums;

enum Rel: string
{
    case Alternate = 'alternate';
    case Author = 'author';
    case Bookmark = 'bookmark';
    case Canonical = 'canonical';
    case DnsPrefetch = 'dns-prefetch';
    case External = 'external';
    case Help = 'help';
    case Icon = 'icon';
    case License = 'license';
    case Manifest = 'manifest';
    case Next = 'next';
    case NoFollow = 'nofollow';
    case NoOpener = 'noopener';
    case NoReferrer = 'noreferrer';
    case Opener = 'opener';
    case Prefetch = 'prefetch';
    case Preload = 'preload';
    case Prev = 'prev';
    case Search = 'search';
    case Stylesheet = 'stylesheet';
    case Tag = 'tag';
}
