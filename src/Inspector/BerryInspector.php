<?php declare(strict_types=1);

namespace Berry\Inspector;

use Berry\Contract\HasAttributesContract;
use Berry\Contract\HasChildrenContract;
use Berry\Contract\HasInspectorPropsContract;
use Berry\Contract\IsRenderableContract;
use Berry\Marker\HideFromInspector;
use Berry\Element;

use function Berry\Html\details;
use function Berry\Html\div;
use function Berry\Html\li;
use function Berry\Html\script;
use function Berry\Html\span;
use function Berry\Html\style;
use function Berry\Html\summary;
use function Berry\Html\ul;

/**
 * @phpstan-import-type DebugFrame from Inspector
 */
final class BerryInspector implements Inspector
{
    public function dump(Element $element, ?array $stacktrace = null): Element&IsRenderableContract
    {
        $trace = $stacktrace ?? debug_backtrace();

        $callerFile = $trace[0]['file'] ?? 'unknown';
        $callerLine = $trace[0]['line'] ?? '';

        $callerLabel = basename($callerFile) . ($callerLine !== '' ? ":$callerLine" : '');

        return new InspectorRoot(
            div()
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
                        ->child($this->renderTreeNode($element))
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
                ->child($this->renderScripts())
        );
    }

    /**
     * @param DebugFrame $t
     */
    private function renderTraceItem(array $t): Element
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

    private function renderTreeNode(Element $element): Element|null
    {
        if ($element instanceof HideFromInspector) {
            return null;
        }

        return div()->class('berry-debug-branch berry-debug-open')->children([
            span()->class('berry-debug-toggle'),
            span()->class('berry-debug-class')->text($element::class),
            div()
                ->class('berry-debug-content')
                ->child($this->renderProps($element))
                ->children(function () use ($element) {
                    if (!($element instanceof HasChildrenContract)) {
                        return [];
                    }

                    return array_map(
                        fn(Element $child) => $this->renderTreeNode($child),
                        array_filter($element->getChildren(), fn(Element|null $child) => $child !== null)
                    );
                })
        ]);
    }

    private function renderProps(Element $element): Element|null
    {
        $props = [];

        if ($element instanceof HasAttributesContract) {
            $props = array_merge($props, $element->getAttributes());
        }

        if ($element instanceof HasInspectorPropsContract) {
            $props = array_merge($props, $element->inspectorProps());
        }

        if (count($props) === 0) {
            return null;
        }

        return div()
            ->class('berry-debug-branch berry-debug-open')
            ->child(div()
                ->class('berry-debug-content')
                ->children(
                    array_map(
                        fn(string $k, string|int|float|bool|null $v) => $this->renderLeaf($k, $v),
                        array_keys($props),
                        $props
                    )
                ));
    }

    private function renderLeaf(string $label, string|int|float|bool|null $data): Element
    {
        $valNode = span();

        if (is_string($data)) {
            $valNode->class('berry-debug-string')->text('"' . $data . '"');
        } elseif (is_bool($data)) {
            $valNode->class('berry-debug-bool')->text($data ? 'true' : 'false');
        } else if (is_null($data)) {
            $valNode->class('berry-debug-bool')->text('null');
        } else {
            $valNode->class('berry-debug-bool')->text((string) $data);
        }

        return div()->class('berry-debug-leaf')->children([
            span()->class('berry-debug-key')->text($label . ':'),
            $valNode
        ]);
    }

    private function renderStyles(): Element
    {
        return style()->unsafeRaw(<<<CSS
            /** Berry Inspector Styling, based on Catppuccin Moccha */
            .berry-debug-root {
                --base: #1e1e2e;
                --mantle: #181825;
                --crust: #11111b;
                --surface0: #313244;
                --text: #cdd6f4;
                --blue: #89b4fa;
                --green: #a6e3a1;
                --teal: #94e2d5;
                --peach: #fab387;
                --mauve: #cba6f7;
                --red: #f38ba8;
                --yellow: #f9e2af;
                --overlay0: #6c7086;
                background: var(--base);
                color: var(--text);
                font-family: "JetBrains Mono", monospace;
                font-size: 11px;
                border-radius: 6px;
                border: 1px solid var(--surface0);
                margin: 10px;
                overflow: hidden;
                line-height: 1.3;
            }

            .berry-debug-header {
                background: var(--mantle);
                padding: 4px 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid var(--surface0);
            }

            .berry-debug-dot {
                width: 7px;
                height: 7px;
                border-radius: 50%;
                display: inline-block;
                margin-right: 2px;
            }

            .berry-debug-red {
                background: var(--red);
            }

            .berry-debug-yellow {
                background: var(--yellow);
            }

            .berry-debug-green {
                background: var(--green);
            }

            .berry-debug-title {
                color: var(--mauve);
                font-weight: bold;
                font-size: 9px;
                letter-spacing: 0.5px;
                margin-left: 5px;
            }

            .berry-debug-caller {
                color: var(--overlay0);
                font-size: 10px;
            }

            .berry-debug-body {
                padding: 8px;
            }

            .berry-debug-branch {
                position: relative;
                padding-left: 14px;
            }

            .berry-debug-content {
                display: none;
                border-left: 1px solid var(--surface0);
                margin-left: 2px;
                padding-left: 8px;
            }

            .berry-debug-content:has(> .berry-debug-leaf) {
                border-left: 0px;
                padding-left: 0px !important;
            }

            .berry-debug-open > .berry-debug-content {
                display: block;
            }

            .berry-debug-toggle {
                position: absolute;
                left: 0;
                cursor: pointer;
                width: 12px;
                height: 12px;
                top: 0px;
            }

            .berry-debug-toggle::before {
                content: "+";
                font-size: 12px;
                color: var(--overlay0);
                display: inline-block;
            }

            .berry-debug-open > .berry-debug-toggle::before {
                content: "-";
            }

            .berry-debug-class {
                color: var(--blue);
                font-weight: bold;
                cursor: pointer;
            }

            .berry-debug-label {
                color: var(--mauve);
                font-size: 9px;
                text-transform: uppercase;
                cursor: pointer;
                opacity: 0.8;
            }

            .berry-debug-key {
                color: var(--teal);
                margin-right: 4px;
            }

            .berry-debug-string {
                color: var(--green);
            }

            .berry-debug-bool {
                color: var(--peach);
            }

            .berry-debug-trace {
                background: var(--mantle);
                border-top: 1px solid var(--surface0);
                margin-bottom: 0px;
            }

            .berry-debug-trace summary {
                padding: 3px 10px;
                cursor: pointer;
                font-size: 9px;
                color: var(--overlay0);
                margin-bottom: 0px !important;
            }

            .berry-debug-trace-scroll {
                max-height: 150px;
                overflow-y: auto;
                background: var(--crust);
            }

            .berry-debug-trace-list {
                list-style: none;
                padding: 6px 10px;
                margin: 0;
            }

            .berry-debug-trace-list li {
                margin-bottom: 2px;
                white-space: nowrap;
                font-size: 10px;
            }

            .berry-debug-trace-app {
                color: var(--teal);
            }

            .berry-debug-trace-vendor {
                color: var(--overlay0);
                opacity: 0.5;
            }

            .berry-debug-trace-func {
                color: var(--mauve);
                opacity: 0.8;
            }
            CSS);
    }

    private function renderScripts(): Element
    {
        return script()->unsafeRaw(<<<JS
            document.querySelectorAll(".berry-debug-root .berry-debug-toggle, .berry-debug-root .berry-debug-class, .berry-debug-root .berry-debug-label").forEach(el => {
                el.onclick = (e) => {
                    e.stopPropagation();
                    const branch = el.closest(".berry-debug-branch");
                    if (branch) branch.classList.toggle("berry-debug-open");
                };
            });
            JS);
    }
}
