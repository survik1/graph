<?php
namespace Survik1\Graph\Series;

use Survik1\Graph\General\Component;
use Survik1\Graph\General\Series;
use Survik1\Graph\Graphic\AreaStyle;

class RadarSeries extends Series
{
    /**
     * @var AreaStyle|null
     */
    protected $areaStyle;

    /**
     * @param string $name
     * @param Component|null $parentObject
     */
    public function __construct(string $name, ?Component $parentObject = null)
    {
        parent::__construct($name, 'radar', $parentObject);
    }

    /**
     * @return AreaStyle|null
     */
    public function getAreaStyle(): ?AreaStyle
    {
        return $this->areaStyle;
    }

    /**
     * @param AreaStyle $areaStyle
     * @return RadarSeries
     */
    public function setAreaStyle(AreaStyle $areaStyle): RadarSeries
    {
        $this->areaStyle = $areaStyle;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = parent::jsonSerialize();
        if ($this->getAreaStyle()) {
            $arr['areaStyle'] = $this->getAreaStyle();
        }
        return $arr;
    }

}
