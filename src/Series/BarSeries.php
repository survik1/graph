<?php
namespace Survik1\Graph\Series;

use Survik1\Graph\General\Component;
use Survik1\Graph\General\Series;

class BarSeries extends Series
{
    /**
     * @var int
     */
    protected $gap = 30;
    /**
     * @var string
     */
    protected $stack;
    /**
     * @var mixed
     */
    protected $width;

    /**
     * @param string $name
     * @param Component|null $parentObject
     */
    public function __construct(string $name, ?Component $parentObject = null)
    {
        parent::__construct($name, 'bar', $parentObject);
    }

    /**
     * @return int
     */
    public function getGap(): int
    {
        return $this->gap;
    }

    /**
     * @return string
     */
    public function getStackId(): ?string
    {
        return $this->stack;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $gap
     * @return BarSeries
     */
    public function setGap(int $gap): BarSeries
    {
        $this->gap = $gap;
        return $this;
    }

    /**
     * Bar series with same stack id will be stacked on each other
     *
     * @param string $stack
     * @return BarSeries
     */
    public function setStackId(string $stack): BarSeries
    {
        $this->stack = $stack;
        return $this;
    }

    /**
     * @param mixed $width
     * @return BarSeries
     */
    public function setWidth($width): BarSeries
    {
        $this->width = $width;
        return $this;
    }


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = parent::jsonSerialize();
        if ($this->getStackId()) {
            $arr['stack'] = $this->getStackId();
        }
        $arr['barGap'] = "{$this->getGap()}%";
        if ($this->getWidth()) {
            $arr['barWidth'] = $this->getWidth();
        }
        return $arr;
    }
}
