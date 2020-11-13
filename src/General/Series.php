<?php
namespace Survik1\Graph\General;

use Survik1\Graph\Component\Emphasis;
use Survik1\Graph\Graphic\Label;


abstract class Series extends Component
{
    /**
     * @var array
     */
    protected $data = [];
    /**
     * @var Emphasis|null
     */
    protected $emphasis;
    /**
     * @var Label
     */
    protected $label;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var int
     */
    protected $xAxisIndex = 0;
    /**
     * @var int
     */
    protected $yAxisIndex = 0;
    /**
     * @var int
     */
    protected $z = 1;

    /**
     * @param string $name
     * @param string $type
     */
    public function __construct(string $name, string $type, ?Component $parentObject = null)
    {
        parent::__construct($parentObject);
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return Emphasis|null
     */
    public function getEmphasis(): ?Emphasis
    {
        return $this->emphasis;
    }

    /**
     * @return Label|null
     */
    public function getLabel(): ?Label
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getXAxisIndex(): int
    {
        return $this->xAxisIndex;
    }

    /**
     * @return int
     */
    public function getYAxisIndex(): int
    {
        return $this->yAxisIndex;
    }

    /**
     * @return int
     */
    public function getZ(): int
    {
        return $this->z;
    }

    /**
     * @param array $data
     * @return Series
     */
    public function setData(array $data): Series
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param Emphasis $emphasis
     * @return Series
     */
    public function setEmphasis(Emphasis $emphasis): Series
    {
        $this->emphasis = $emphasis;
        return $this;
    }

    /**
     * @param Label $label
     * @return Series
     */
    public function setLabel(Label $label): Series
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param int $xAxisIndex
     * @return Series¨
     */
    public function setXAxisIndex(int $xAxisIndex): Series
    {
        $this->xAxisIndex = $xAxisIndex;
        return $this;
    }

    /**
     * @param int $yAxisIndex
     * @return Series
     */
    public function setYAxisIndex(int $yAxisIndex): Series
    {
        $this->yAxisIndex = $yAxisIndex;
        return $this;
    }

    /**
     * @param int $z
     * @return Series
     */
    public function setZ(int $z): Series
    {
        $this->z = $z;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'emphasis' => $this->getEmphasis(),
            'name' => $this->getName(),
            'label' => $this->getLabel(),
            'type' => $this->getType(),
            'data' => $this->getData(),
            'xAxisIndex' => $this->getXAxisIndex(),
            'yAxisIndex' => $this->getYAxisIndex(),
            'z' => $this->getZ(),
        ];
    }
}
