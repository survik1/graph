<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;

class Radar extends Component
{
    /**
     * @var Name
     */
    protected $name;
    /**
     * @var array
     */
    protected $center = ['50%', '50%'];
    /**
     * @var Indicator[]
     */
    protected $indicators = [];

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
    public function getIndicators(): array
    {
        return $this->indicators;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @param array $center
     * @return Radar
     * @throws InvalidArgumentException
     */
    public function setCenter(array $center): Radar
    {
        if (count($center) !== 2) {
            throw new InvalidArgumentException(sprintf("Radar center parameter requires exactly 2 values inside the array, %d given.", count($center)));
        }
        $this->center = $center;
        return $this;
    }

    /**
     * @param Indicator $indicator
     * @return Radar
     */
    public function addIndicator(Indicator $indicator): Radar
    {
        $this->indicators[] = $indicator;
        return $this;
    }

    /**
     * @param Name $name
     * @return Radar
     */
    public function setName(Name $name): Radar
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'center' => $this->getCenter(),
            'name' => $this->getName(),
            'indicator' => $this->getIndicators(),
        ];
    }
}
