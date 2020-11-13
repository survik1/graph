<?php
namespace Survik1\Graph\Graphic;

use Survik1\Graph\Enum\AxisPointerType;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;

class AxisPointer extends Component
{
    /**
     * @var bool
     */
    protected $show = true;
    /**
     * @var string
     */
    protected $type;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @param string $type
     * @return AxisPointer
     */
    public function setType(string $type): AxisPointer
    {
        if (!in_array($type, [
            AxisPointerType::CROSS,
            AxisPointerType::LINE,
            AxisPointerType::SHADOW,
            AxisPointerType::NONE,
        ])) {
            throw new InvalidArgumentException("Axis pointer type {$type} is not valid");
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @param bool $show
     * @return AxisPointer
     */
    public function setVisibility(bool $show): AxisPointer
    {
        $this->show = $show;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => $this->getType(),
            'show' => $this->isVisible(),
        ];
    }
}
