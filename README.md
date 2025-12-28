# Berry

No dependency, fast PHP eDSL for writing HTML

Define HTML templates using PHP without losing access to tools like phpstan and xdebug

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
