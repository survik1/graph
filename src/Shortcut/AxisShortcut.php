<?php
namespace Survik1\Graph\Shortcut;

use Survik1\Graph\Component\Axis;
use Survik1\Graph\Graphic\AxisLabel;
use Survik1\Graph\Graphic\AxisPointer;

trait AxisShortcut
{
    /**
     * @param string $postfix
     * @return Axis
     */
    public function setLabelPostfixFast(string $postfix): Axis
    {
        if (!$this->getAxisLabel()) {
            $this->setAxisLabel(new AxisLabel($this));
        }
        $this->getAxisLabel()->setPostfix($postfix);
        return $this;
    }

    /**
     * @param string $type
     * @return Axis
     */
    public function setPointerTypeFast(string $type): Axis
    {
        if (!$this->getAxisPointer()) {
            $this->setAxisPointer(new AxisPointer($this));
        }
        $this->getAxisPointer()->setType($type);
        return $this;
    }
}
