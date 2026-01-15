# Berry HTML

No more context-switching, just build your HTML templates in PHP.

## Usage

Install via composer

```bash
$ composer req berry/html
```

```php
<?php declare(strict_types=1);

// renders a counter button and a debug representation of itself
// clicking on the button will send a POST request to the current script
function counterButton(int $value): Element
{
    $nextValue = $value + 1;

    /** @var string $current */
    $current = $_SERVER['PHP_SELF'] ?? '/';

    return div()
        ->attr('hx-target', 'this')
        ->child(
            button()
                ->id('counter-button')
                ->attr('hx-post', "$current?counter=$nextValue")
                ->attr('hx-swap', 'outerHTML')
                ->text("+ $value")
        )
        ->child(hr())
        ->dump(true);
}

// our website layout to wrap around the content
// includes picocss and htmx
function layout(Element $content): Element
{
    return html()
        ->child(head()
            ->child(title()->text('Hello, Berry!'))
            ->child(link()
                ->rel(Rel::Stylesheet)
                ->href('https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css')))
        ->child(body()
            ->child(header())
            ->child(div()
                ->class('container')
                ->child($content))
            ->child(script()->src('https://cdnjs.cloudflare.com/ajax/libs/htmx/2.0.7/htmx.min.js')));
}

// if we get a POST render only the counter button and stop
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_GET['counter'] ?? '1';
    assert(is_string($value));

    $value = intval($value);

    echo counterButton($value)->toString();
    die();
}

// and lastly render the normal page template
echo layout(
    main()
        ->class('container')
        ->child(h1()->text('Hello, Berry!'))
        ->child(p()->text('This is an example page rendering HTML using Berry'))
        ->child(counterButton(1))
)->toString();
```

![Example Screenshot](./.github/example_screenshot.png)

## Ecosystem

Some other related packages:

- [berry/symfony](https://github.com/berry-php/symfony) - Symfony integration
- [berry/htmx](https://github.com/berry-php/htmx) - HTMX integration

## License

MIT
