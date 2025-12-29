# Berry

Berry is a zero-dependency, type-safe toolkit for building HTML structures using pure PHP.

## Features

- **Pure PHP eDSL**: Define HTML structures using a fluent API, no new template syntax to learn just pure PHP
- **Type Safety**: Designed with PHPStan in mind, benefit from static analysis to catch bugs before they hit production
- **Built-in inspector**: Berry includes a visual debugging tool that renders a tree of your components and stack traces directly in the browser
- **Extensible**: Extend Berry with custom attributes using the integrated extension method functionality

## Usage

Install via composer

```bash
$ composer req berry/html
```

```php
<?php declare(strict_types=1);

namespace App\View;

use Berry\Renderable;

use function Berry\Html5\html;
use function Berry\Html5\head;
use function Berry\Html5\body;
use function Berry\Html5\div;

class IndexView
{
    public static function render(): Renderable
    {
        return html()
            ->lang('en')
            ->child(head()
                ->child(title()->text('Index Page')))
            ->child(body()
                ->child(
                    div()
                        ->class('container')
                        ->child(
                            h1()->text('Index Page')
                        )
                )
                ->child(
                    footer()->text('This is a footer')
                )
            );
    }
}

```

## Ecosystem

Some other related packages:

- [berry/symfony](https://github.com/atomicptr/berry-symfony) - Symfony integration
- [berry/htmx](https://github.com/atomicptr/berry-symfony) - HTMX integration

## License

MIT
