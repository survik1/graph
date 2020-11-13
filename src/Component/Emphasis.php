<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\General\Component;
use Survik1\Graph\Graphic\ItemStyle;
use Survik1\Graph\Graphic\Label;

class Emphasis extends Component
{
    /**
     * @var Label
     */
    protected $label;
    /**
     * @var ItemStyle
     */
    protected $itemStyle;

    /**
     * @return Label|null
     */
    public function getLabel(): ?Label
    {
        return $this->label;
    }

    /**
     * @return ItemStyle|null
     */
    public function getItemStyle(): ?ItemStyle
    {
        return $this->itemStyle;
    }

    /**
     * @param Label $label
     * @return Emphasis
     */
    public function setLabel(Label $label): Emphasis
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param ItemStyle $itemStyle
     * @return Emphasis
     */
    public function setItemStyle(ItemStyle $itemStyle): Emphasis
    {
        $this->itemStyle = $itemStyle;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'label' => $this->getLabel(),
            'itemStyle' => $this->getItemStyle(),
        ];
    }
}