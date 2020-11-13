<?php
namespace Survik1\Graph\DataZoom;

use Survik1\Graph\Enum\FilterMode;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;
use Survik1\Graph\General\DataZoom;

class SliderDataZoom extends DataZoom
{
    /**
     * @var string
     */
    protected $bottom = "auto";
    /**
     * @var string
     */
    protected $filterMode = 'filter';
    /**
     * @var string
     */
    protected $height;
    /**
     * @var string
     */
    protected $left = "auto";
    /**
     * @var string
     */
    protected $right = "ph";
    /**
     * @var string
     */
    protected $top = "ph";
    /**
     * @var string
     */
    protected $width;
    /**
     * @var int|null
     */
    protected $xAxisIndex;
    /**
     * @var int|null
     */
    protected $yAxisIndex;

    /**
     * @param Component|null $parentObject
     */
    public function __construct(?Component $parentObject = null)
    {
        parent::__construct("slider", $parentObject);
    }

    /**
     * @return string
     */
    public function getBottom(): string
    {
        return $this->bottom;
    }

    /**
     * @return string
     */
    public function getFilterMode(): string
    {
        return $this->filterMode;
    }

    /**
     * @return string
     */
    public function getLeft(): string
    {
        return $this->left;
    }

    /**
     * @return string|null
     */
    public function getHeight(): ?string
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getRight(): string
    {
        return $this->right;
    }

    /**
     * @return string
     */
    public function getTop(): string
    {
        return $this->top;
    }

    /**
     * @return string|null
     */
    public function getWidth(): ?string
    {
        return $this->width;
    }

    /**
     * @return int|null
     */
    public function getXAxisIndex(): ?int
    {
        return $this->xAxisIndex;
    }

    /**
     * @return int|null
     */
    public function getYAxisIndex(): ?int
    {
        return $this->yAxisIndex;
    }

    /**
     * @param string $bottom
     * @return SliderDataZoom
     */
    public function setBottom(string $bottom): SliderDataZoom
    {
        $this->bottom = $bottom;
        return $this;
    }

    /**
     * @param string $mode
     * @return void
     */
    public function setFilterMode(string $mode): SliderDataZoom
    {
        if (!in_array($mode, [
            FilterMode::EMPTY,
            FilterMode::FILTER,
            FilterMode::WEAK_FILTER,
            FilterMode::NONE,
        ])) {
            throw new InvalidArgumentException("Filter mode {$mode} is not valid");
        }
        $this->filterMode = $mode;
        return $this;
    }

    /**
     * @param string $height
     * @return SliderDataZoom
     */
    public function setHeight(string $height): SliderDataZoom
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param string $left
     * @return SliderDataZoom
     */
    public function setLeft(string $left): SliderDataZoom
    {
        $this->left = $left;
        return $this;
    }

    /**
     * @param string $right
     * @return SliderDataZoom
     */
    public function setRight(string $right): SliderDataZoom
    {
        $this->right = $right;
        return $this;
    }

    /**
     * @param string $top
     * @return SliderDataZoom
     */
    public function setTop(string $top): SliderDataZoom
    {
        $this->top = $top;
        return $this;
    }

    /**
     * @param string $width
     * @return SliderDataZoom
     */
    public function setWidth(string $width): SliderDataZoom
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param int $xAxisIndex
     * @return SliderDataZoom
     */
    public function setXAxisIndex(int $xAxisIndex): SliderDataZoom
    {
        $this->xAxisIndex = $xAxisIndex;
        return $this;
    }

    /**
     * @param int $yAxisIndex
     * @return SliderDataZoom
     */
    public function setYAxisIndex(int $yAxisIndex): SliderDataZoom
    {
        $this->yAxisIndex = $yAxisIndex;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = parent::jsonSerialize();
        $arr = array_merge($arr, [
            'filterMode' => $this->getFilterMode(),
            'xAxisIndex' => $this->getXAxisIndex(),
            'yAxisIndex' => $this->getYAxisIndex(),
            'bottom' => $this->getBottom(),
            'left' => $this->getLeft(),
            'right' => $this->getRight(),
            'top' => $this->getTop(),
        ]);

        if ($this->getHeight()) {
            $arr['height'] = $this->getHeight();
        }

        if ($this->getWidth()) {
            $arr['width'] = $this->getWidth();
        }

        return $arr;
    }
}
