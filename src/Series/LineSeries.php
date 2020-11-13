<?php
namespace Survik1\Graph\Series;

use Survik1\Graph\General\Component;
use Survik1\Graph\General\Series;
use Survik1\Graph\Graphic\ItemStyle;
use Survik1\Graph\Graphic\LineStyle;

class LineSeries extends Series
{
    /**
     * @var bool
     */
    protected $smooth = false;
    /**
     * @var LineStyle
     */
    protected $lineStyle;
    /**
     * @var ItemStyle
     */
    protected $itemStyle;

    /**
     * @param string $name
     * @param Component|null $parentObject
     */
    public function __construct(string $name, ?Component $parentObject = null)
    {
        parent::__construct($name, 'line', $parentObject);
        $this->lineStyle = new LineStyle($this);
        $this->itemStyle = new ItemStyle($this);
    }

    /**
     * @return bool
     */
    public function isSmooth(): bool
    {
        return $this->smooth;
    }

    /**
     * @return ItemStyle
     */
    public function getItemStyle(): ItemStyle
    {
        return $this->itemStyle;
    }

    /**
     * @return LineStyle
     */
    public function getLineStyle(): LineStyle
    {
        return $this->lineStyle;
    }

    /**
     * @param ItemStyle $itemStyle
     * @return LineSeries
     */
    public function setItemStyle(ItemStyle $itemStyle): LineSeries
    {
        $this->itemStyle = $itemStyle;
        return $this;
    }

    /**
     * @param LineStyle $lineStyle
     * @return LineSeries
     */
    public function setLineStyle(LineStyle $lineStyle): LineSeries
    {
        $this->lineStyle = $lineStyle;
        return $this;
    }

    /**
     * @param bool $smooth
     * @return LineSeries
     */
    public function setSmooth(bool $smooth): LineSeries
    {
        $this->smooth = $smooth;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = parent::jsonSerialize();
        $arr['smooth'] = $this->isSmooth();
        $arr['lineStyle'] = $this->getLineStyle();
        $arr['itemStyle'] = $this->getItemStyle();
        return $arr;
    }
}
