<?php declare(strict_types=1);

namespace Berry\Debug;

use Berry\Renderable;

use function Berry\Html5\details;
use function Berry\Html5\div;
use function Berry\Html5\li;
use function Berry\Html5\script;
use function Berry\Html5\span;
use function Berry\Html5\style;
use function Berry\Html5\summary;
use function Berry\Html5\ul;

/**
 * @phpstan-import-type DebugFrame from Inspector
 * @phpstan-import-type RenderableArrayRepr from Renderable
 */
final class BerryInspector implements Inspector
{
    public function dump(Renderable $element, ?array $stacktrace = null): Renderable
    {
        /** @var RenderableArrayRepr $data */
        $data = $element->toArray();
        $trace = $stacktrace ?? debug_backtrace();

        $callerFile = $trace[0]['file'] ?? 'unknown';
        $callerLine = $trace[0]['line'] ?? '';

        $callerLabel = basename($callerFile) . ($callerLine !== '' ? ":$callerLine" : '');

        return div()
            ->class('berry-debug-root')
            ->child($this->renderStyles())
            // header
            ->child(
                div()
                    ->class('berry-debug-header')
                    ->child(
                        div()
                            ->class('berry-debug-controls')
                            ->child(span()->class('berry-debug-dot berry-debug-red'))
                            ->child(span()->class('berry-debug-dot berry-debug-yellow'))
                            ->child(span()->class('berry-debug-dot berry-debug-green'))
                            ->child(span()->class('berry-debug-title')->text('BERRY INSPECTOR'))
                    )
                    ->child(span()->class('berry-debug-caller')->text($callerLabel)),
            )
            // node tree
            ->child(
                div()
                    ->class('berry-debug-body')
                    ->child($this->renderTreeNode($data))
            )
            // stacktrace
            ->child(
                details()
                    ->class('berry-debug-trace')
                    ->child(summary()->text('Trace (' . count($trace) . ')'))
                    ->child(
                        div()
                            ->class('berry-debug-trace-scroll')
                            ->child(
                                ul()
                                    ->class('berry-debug-trace-list')
                                    ->children(array_map([$this, 'renderTraceItem'], $trace))
                            )
                    ),
            )
            ->child($this->renderScripts());
    }

    /**
     * @param DebugFrame $t
     */
    private function renderTraceItem(array $t): Renderable
    {
        $file = $t['file'] ?? 'internal';
        $line = $t['line'] ?? '0';
        $func = ($t['class'] ?? '') . ($t['type'] ?? '') . ($t['function'] ?? '');
        $isVendor = str_contains($file, 'vendor');

        return li()->class($isVendor ? 'berry-debug-trace-vendor' : 'berry-debug-trace-app')->children([
            span()->class('berry-debug-trace-path')->text(basename($file) . ":$line"),
            span()->class('berry-debug-trace-func')->text(" $func()")
        ]);
    }

    /**
     * @param RenderableArrayRepr $data
     */
    private function renderTreeNode(array $data): Renderable
    {
        [$class, $props, $children] = $data;

        return div()->class('berry-debug-branch berry-debug-open')->children([
            span()->class('berry-debug-toggle'),
            span()->class('berry-debug-class')->text($class),
            div()
                ->class('berry-debug-content')
                ->child($this->renderProps($props))
                ->children(
                    array_map(
                        function (array $node) {
                            /** @var RenderableArrayRepr $node */
                            return $this->renderTreeNode($node);
                        },
                        $children
                    )
                )
        ]);
    }

    /**
     * @param array<string, string|int|float|bool> $props
     */
    private function renderProps(array $props): Renderable|null
    {
        if (count($props) === 0) {
            return null;
        }

        return div()
            ->class('berry-debug-branch berry-debug-open')
            ->child(span()
                ->class('berry-debug-label')
                ->text('props'))
            ->child(div()
                ->class('berry-debug-content')
                ->children(
                    array_map(fn(string $k, string|int|float|bool $v) => $this->renderLeaf($k, $v), array_keys($props), $props)
                ));
    }

    private function renderLeaf(string $label, string|int|float|bool $data): Renderable
    {
        $valNode = span();
        if (is_string($data)) {
            $valNode->class('berry-debug-string')->text('"' . $data . '"');
        } elseif (is_bool($data)) {
            $valNode->class('berry-debug-bool')->text($data ? 'true' : 'false');
        } else {
            $valNode->class('berry-debug-bool')->text((string) $data);
        }

        return div()->class('berry-debug-leaf')->children([
            span()->class('berry-debug-key')->text($label . ':'),
            $valNode
        ]);
    }

    private function renderStyles(): Renderable
    {
        return style()->raw('
            .berry-debug-root {
                --base: #1e1e2e; --mantle: #181825; --crust: #11111b;
                --surface0: #313244; --text: #cdd6f4; --blue: #89b4fa;
                --green: #a6e3a1; --teal: #94e2d5; --peach: #fab387;
                --mauve: #cba6f7; --red: #f38ba8; --yellow: #f9e2af;
                --overlay0: #6c7086;
                background: var(--base); color: var(--text); font-family: "JetBrains Mono", monospace;
                font-size: 11px; border-radius: 6px; border: 1px solid var(--surface0); margin: 10px; overflow: hidden; line-height: 1.3;
            }
            .berry-debug-header { background: var(--mantle); padding: 4px 10px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--surface0); }
            .berry-debug-dot { width: 7px; height: 7px; border-radius: 50%; display: inline-block; margin-right: 2px; }
            .berry-debug-red { background: var(--red); } .berry-debug-yellow { background: var(--yellow); } .berry-debug-green { background: var(--green); }
            .berry-debug-title { color: var(--mauve); font-weight: bold; font-size: 9px; letter-spacing: 0.5px; margin-left: 5px; }
            .berry-debug-caller { color: var(--overlay0); font-size: 10px; }
            .berry-debug-body { padding: 8px; }
            .berry-debug-branch { position: relative; padding-left: 14px; }
            .berry-debug-content { display: none; border-left: 1px solid var(--surface0); margin-left: 2px; padding-left: 8px; }
            .berry-debug-open > .berry-debug-content { display: block; }
            .berry-debug-toggle { position: absolute; left: 0; cursor: pointer; width: 10px; height: 10px; top: 1px; }
            .berry-debug-toggle::before { content: "▶"; font-size: 7px; color: var(--overlay0); display: inline-block; transition: transform 0.1s; }
            .berry-debug-open > .berry-debug-toggle::before { transform: rotate(90deg); }
            .berry-debug-class { color: var(--blue); font-weight: bold; cursor: pointer; }
            .berry-debug-label { color: var(--mauve); font-size: 9px; text-transform: uppercase; cursor: pointer; opacity: 0.8; }
            .berry-debug-key { color: var(--teal); margin-right: 4px; }
            .berry-debug-string { color: var(--green); }
            .berry-debug-bool { color: var(--peach); }
            .berry-debug-trace { background: var(--mantle); border-top: 1px solid var(--surface0); }
            .berry-debug-trace summary { padding: 3px 10px; cursor: pointer; font-size: 9px; color: var(--overlay0); }
            .berry-debug-trace-scroll { max-height: 150px; overflow-y: auto; background: var(--crust); }
            .berry-debug-trace-list { list-style: none; padding: 6px 10px; margin: 0; }
            .berry-debug-trace-list li { margin-bottom: 2px; white-space: nowrap; font-size: 10px; }
            .berry-debug-trace-app { color: var(--teal); }
            .berry-debug-trace-vendor { color: var(--overlay0); opacity: 0.5; }
            .berry-debug-trace-func { color: var(--mauve); opacity: 0.8; }
        ');
    }

    private function renderScripts(): Renderable
    {
        return script()->raw('
            document.querySelectorAll(".berry-debug-root .berry-debug-toggle, .berry-debug-root .berry-debug-class, .berry-debug-root .berry-debug-label").forEach(el => {
                el.onclick = (e) => {
                    e.stopPropagation();
                    const branch = el.closest(".berry-debug-branch");
                    if (branch) branch.classList.toggle("berry-debug-open");
                };
            });
        ');
    }
}
