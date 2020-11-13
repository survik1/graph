<?php
namespace Survik1\Graph\Series;

use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;
use Survik1\Graph\General\Series;

class PieSeries extends Series
{
    /**
     * @var array
     */
    protected $radius = [0, '75%'];
    /**
     * @var array
     */
    protected $center = ['50%', '50%'];
    /**
     * @var false
     */
    protected $avoidLabelOverlap = true;

    /**
     * @param string $name
     * @param Component|null $parentObject
     */
    public function __construct(string $name, ?Component $parentObject = null)
    {
        parent::__construct($name, 'pie', $parentObject);
    }

    /**
     * @return array
     */
    public function getCenter(): array
    {
        return $this->center;
    }

    /**
     * @return array
     */
    public function getRadius(): array
    {
        return $this->radius;
    }

    /**
     * @return bool
     */
    public function isLabelOverlapAvoided(): bool
    {
        return $this->avoidLabelOverlap;
    }

    /**
     * @param array $center
     * @return PieSeries
     */
    public function setCenter(array $center): PieSeries
    {
        $this->center = $center;
        return $this;
    }

    /**
     * @param array $radius
     * @return PieSeries
     * @throws InvalidArgumentException
     */
    public function setRadius(array $radius): PieSeries
    {
        if (count($radius) !== 2) {
            throw new InvalidArgumentException(sprintf("PieSeries radius parameter requires exactly 2 values inside the array, %d given.", count($radius)));
        }
        $this->radius = $radius;
        return $this;
    }

    /**
     * @param bool $avoidLabelOverlap
     * @return PieSeries
     */
    public function setAvoidLabelOverlap(bool $avoidLabelOverlap): PieSeries
    {
        $this->avoidLabelOverlap = $avoidLabelOverlap;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = parent::jsonSerialize();
        $arr['radius'] = $this->getRadius();
        $arr['center'] = $this->getCenter();
        $arr['avoidLabelOverlap'] = $this->isLabelOverlapAvoided();
        return $arr;
    }

}
