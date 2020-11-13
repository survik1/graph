<?php

namespace Survik1\Graph\Shortcut;

use Survik1\Graph\Component\Title;
use Survik1\Graph\Component\Toolbox;
use Survik1\Graph\Component\Tooltip;
use Survik1\Graph\Enum\TooltipTrigger;
use Survik1\Graph\Graph;
use Survik1\Graph\Graphic\AxisPointer;

trait GraphShortcut
{
    /**
     * Generate default title object
     *
     * @param string $title
     * @param string|null $subtitle
     * @return Graph
     */
    public function setTitleFast(string $title, ?string $subtitle = null): Graph
    {
        if (method_exists($this, 'setTitle')) {
            $this->setTitle((new Title($title, $this))->setSubText($subtitle));
        }
        return $this;
    }

    /**
     * Generate default tooltip
     *
     * @return Graph
     */
    public function setTooltipFast(): Graph
    {
        if (method_exists($this, 'setTooltip')) {
            $this->setTooltip(
                ($tooltip = (new Tooltip($this))
                    ->setTrigger(TooltipTrigger::AXIS))
                    ->setAxisPointer(new AxisPointer($tooltip))
            );
        }
        return $this;
    }

    /**
     * Generate default toolbox
     *
     * @return Graph
     */
    public function setToolboxFast(): Graph
    {
        if (method_exists($this, 'setToolbox')) {
            $this->setToolbox(
                new Toolbox($this)
            );
        }
        return $this;
    }
}
