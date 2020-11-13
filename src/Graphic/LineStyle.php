<?php
namespace Survik1\Graph\Graphic;

use Survik1\Graph\General\Style;

class LineStyle extends Style
{
    /**
     * @var int
     */
    protected $width = 2;

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return LineStyle
     */
    public function setWidth(int $width): LineStyle
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'width' => $this->getWidth(),
        ]);
    }
}
