<?php declare(strict_types=1);

namespace Berry\Inspector;

use Berry\Marker\HideFromInspector;
use Berry\Component;
use Berry\Element;

/**
 * A special root container for the inspector
 */
final class InspectorRoot extends Component implements HideFromInspector
{
    public function __construct(
        private Element $root
    ) {}

    public function renderComponent(): Element
    {
        return $this->root;
    }
}
