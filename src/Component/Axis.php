<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\Enum\AxisType;
use Survik1\Graph\Exception\DataNotInitializedException;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;
use Survik1\Graph\Graphic\AxisLabel;
use Survik1\Graph\Graphic\AxisPointer;
use Survik1\Graph\Shortcut\AxisShortcut;

class Axis extends Component
{
    use AxisShortcut;
    /**
     * @var int
     */
    protected $index;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var array
     */
    protected $data;
    /**
     * @var float
     */
    protected $min;
    /**
     * @var float
     */
    protected $max;
    /**
     * @var int
     */
    protected $offset = 0;
    /**
     * @var float
     */
    protected $interval;
    /**
     * @var boolean
     */
    protected $show = true;
    /**
     * @var AxisLabel
     */
    protected $axisLabel;
    /**
     * @var AxisPointer
     */
    protected $axisPointer;

    /**
     * @param string    $name
     * @param string    $type
     * @param bool|null $initLabel
     * @param bool|null $initPointer
     */
    public function __construct(string $name, string $type, ?bool $initLabel = null, ?bool $initPointer = null, ?Component $parentObject = null)
    {
        parent::__construct($parentObject);
        $this->setName($name);
        $this->setType($type);
        if ($type === AxisType::LOGARITHMIC) {
            $this->setMin(1);
        }
        if ($initLabel) {
            $this->axisLabel = new AxisLabel($this);
        }
        if ($initPointer) {
            $this->axisPointer = new AxisPointer($this);
        }
    }

    /**
     * @return int
     * @throws DataNotInitializedException
     */
    public function getIndex(): int
    {
        if ($this->index === null) {
            throw new DataNotInitializedException("Axis hasnt been initialized yet");
        }
        return $this->index;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @return float|null
     */
    public function getMin(): ?float
    {
        return $this->min;
    }

    /**
     * @return float|null
     */
    public function getMax(): ?float
    {
        return $this->max;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return float|null
     */
    public function getInterval(): ?float
    {
        return $this->interval;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @param int $index
     * @return void
     */
    public function setIndex(int $index): Axis
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @return AxisLabel
     */
    public function getAxisLabel(): ?AxisLabel
    {
        return $this->axisLabel;
    }

    /**
     * @return AxisPointer
     */
    public function getAxisPointer(): ?AxisPointer
    {
        return $this->axisPointer;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): Axis
    {
        if (!in_array($type, [
            AxisType::CATEGORY,
            AxisType::LOGARITHMIC,
            AxisType::TIME,
            AxisType::VALUE,
        ])) {
            throw new InvalidArgumentException("Axis type {$type} is not valid");
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): Axis
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $data
     * @return void
     */
    public function setData(array $data): Axis
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param float $min
     * @return void
     */
    public function setMin(float $min): Axis
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @param float $max
     * @return void
     */
    public function setMax(float $max): Axis
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @param int $offset
     * @return Axis
     */
    public function setOffset(int $offset): Axis
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param float $interval
     * @return void
     */
    public function setInterval(float $interval): Axis
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * @param bool $show
     * @return void
     */
    public function setVisibility(bool $show): Axis
    {
        $this->show = $show;
        return $this;
    }

    /**
     * @param AxisLabel $axisLabel
     */
    public function setAxisLabel(AxisLabel $axisLabel): Axis
    {
        $this->axisLabel = $axisLabel;
        return $this;
    }

    /**
     * @param AxisPointer $axisPointer
     */
    public function setAxisPointer(AxisPointer $axisPointer): Axis
    {
        $this->axisPointer = $axisPointer;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = [
            'type' => $this->getType(),
            'name' => $this->getName(),
            'min' => $this->getMin(),
            'max' => $this->getMax(),
            'show' => $this->isVisible(),
            'data' => $this->getData(),
            'offset' => $this->getOffset(),
        ];

        if ($this->getInterval() && $this->getInterval() !== AxisType::CATEGORY) {
            $arr['interval'] = $this->getInterval();
        }

        if ($this->getAxisLabel()) {
            $arr['axisLabel'] = $this->getAxisLabel();
        }

        if ($this->getAxisPointer()) {
            $arr['axisPointer'] = $this->getAxisPointer();
        }

        return $arr;
    }
}
