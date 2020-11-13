<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\Enum\AxisPointerType;
use Survik1\Graph\Enum\TooltipTrigger;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;
use Survik1\Graph\Graphic\AxisPointer;
use Survik1\Graph\Traits\FormatterTrait;

class Tooltip extends Component
{
    use FormatterTrait;

    /**
     * @var AxisPointer
     */
    protected $axisPointer;
    /**
     * @var bool
     */
    protected $showContent = true;
    /**
     * @var string
     */
    protected $trigger;

    /**
     * @return AxisPointer
     */
    public function getAxisPointer(): ?AxisPointer
    {
        return $this->axisPointer;
    }

    /**
     * @return string
     */
    public function getTrigger(): ?string
    {
        return $this->trigger;
    }

    /**
     * @return bool
     */
    public function isContentVisible(): bool
    {
        return $this->showContent;
    }

    /**
     * @param AxisPointer $axisPointer
     * @return Tooltip
     */
    public function setAxisPointer(AxisPointer $axisPointer): Tooltip
    {
        $this->axisPointer = $axisPointer->setType(AxisPointerType::CROSS);
        return $this;
    }

    /**
     * @param bool $showContent
     * @return Tooltip
     */
    public function setContentVisibility(bool $showContent): Tooltip
    {
        $this->showContent = $showContent;
        return $this;
    }

    /**
     * @param string $trigger
     * @return Tooltip
     */
    public function setTrigger(string $trigger): Tooltip
    {
        if (!in_array($trigger, [
            TooltipTrigger::ITEM,
            TooltipTrigger::AXIS,
            TooltipTrigger::NONE,
        ])) {
            throw new InvalidArgumentException("Tooltip trigger {$trigger} is not valid");
        }
        $this->trigger = $trigger;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = [
            'trigger' => $this->getTrigger(),
            'axisPointer' => $this->getAxisPointer(),
            'showContent' => $this->isContentVisible(),
        ];

        if ($this->getFormatter() !== null) {
            $arr['formatter'] = $this->getFormatter();
        }

        return $arr;
    }
}
