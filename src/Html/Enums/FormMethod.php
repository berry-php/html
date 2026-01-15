<?php declare(strict_types=1);

namespace Berry\Html\Enums;

enum FormMethod: string
{
    case Get = 'GET';
    case Post = 'POST';
    case Dialog = 'dialog';
}
