<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\General\Component;

class Indicator extends Component
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $min;
    /**
     * @var int
     */
    protected $max;

    /**
     * @param string $name
     * @param Component|null $parentObject
     */
    public function __construct(string $name, ?Component $parentObject = null)
    {
        parent::__construct($parentObject);
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getMin(): ?int
    {
        return $this->min;
    }

    /**
     * @return int|null
     */
    public function getMax(): ?int
    {
        return $this->max;
    }

    /**
     * @param string $name
     * @return Indicator
     */
    public function setName(string $name): Indicator
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $min
     * @return Indicator
     */
    public function setMin(int $min): Indicator
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @param int $max
     * @return Indicator
     */
    public function setMax(int $max): Indicator
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = [
            'name' => $this->getName(),
        ];

        if ($this->getMin() !== null) {
            $arr['min'] = $this->getMin();
        }

        if ($this->getMax() !== null) {
            $arr['max'] = $this->getMax();
        }

        return $arr;
    }
}
