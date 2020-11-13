<?php
namespace Survik1\Graph\General;

abstract class DataZoom extends Component
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var bool
     */
    protected $show = true;
    /**
     * @var int
     */
    protected $start;
    /**
     * @var int
     */
    protected $end;
    /**
     * @var int
     */
    protected $startValue;
    /**
     * @var int
     */
    protected $endValue;

    /**
     * @param string            $type
     * @param Component|null    $parentObject
     */
    public function __construct(string $type, ?Component $parentObject = null)
    {
        parent::__construct($parentObject);
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int|null
     */
    public function getStart(): ?int
    {
        return $this->start;
    }

    /**
     * @return int|null
     */
    public function getEnd(): ?int
    {
        return $this->end;
    }

    /**
     * @return int|null
     */
    public function getStartValue(): ?int
    {
        return $this->startValue;
    }

    /**
     * @return int|null
     */
    public function getEndValue(): ?int
    {
        return $this->endValue;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @param bool $show
     * @return DataZoom
     */
    public function setVisibility(bool $show): DataZoom
    {
        $this->show = $show;
        return $this;
    }

    /**
     * @param int $start
     * @return DataZoom
     */
    public function setStart(int $start): DataZoom
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @param int $end
     * @return DataZoom
     */
    public function setEnd(int $end): DataZoom
    {
        $this->end = $end;
        return $this;
    }

    /**
     * @param int $startValue
     * @return DataZoom
     */
    public function setStartValue(int $startValue): DataZoom
    {
        $this->startValue = $startValue;
        return $this;
    }

    /**
     * @param int $endValue
     * @return DataZoom
     */
    public function setEndValue(int $endValue): DataZoom
    {
        $this->endValue = $endValue;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = [
            'type' => $this->getType(),
            'show' => $this->isVisible(),
        ];

        if ($this->getStart() !== null) {
            $arr['start'] = $this->getStart();
        } else {
            $arr['startValue'] = $this->getStartValue();
        }

        if ($this->getEnd() !== null) {
            $arr['end'] = $this->getEnd();
        } else {
            $arr['endValue'] = $this->getEndValue();
        }

        return $arr;
    }
}
