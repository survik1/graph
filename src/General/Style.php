<?php
namespace Survik1\Graph\General;

class Style extends Component
{
    /**
     * @var string
     */
    protected $color;
    /**
     * @var float
     */
    protected $opacity;

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @return float|null
     */
    public function getOpacity(): ?float
    {
        return $this->opacity;
    }

    /**
     * @param string $color
     * @return Style
     */
    public function setColor(string $color): Style
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param float $opacity
     * @return Style
     */
    public function setOpacity(float $opacity): Style
    {
        if ($opacity > 1) {
            $opacity = 1;
        } elseif ($opacity < 0) {
            $opacity = 0;
        }

        $this->opacity = $opacity;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = [];
        if ($this->getColor()) {
            $arr['color'] = $this->getColor();
        }

        if ($this->getOpacity() !== null) {
            $arr['opacity'] = $this->getOpacity();
        }

        return $arr;
    }
}
