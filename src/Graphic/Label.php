<?php
namespace Survik1\Graph\Graphic;

use Survik1\Graph\General\Component;
use Survik1\Graph\Traits\FormatterTrait;

class Label extends Component
{
    use FormatterTrait;
    /**
     * @var string
     */
    protected $position;
    /**
     * @var bool
     */
    protected $show = true;
    /**
     * @var TextStyle
     */
    protected $textStyle;

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @return TextStyle|null
     */
    public function getTextStyle(): ?TextStyle
    {
        return $this->textStyle;
    }

    /**
     * @param string $position
     * @return Label
     */
    public function setPosition(string $position): Label
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @param bool $show
     * @return Label
     */
    public function setVisibility(bool $show): Label
    {
        $this->show = $show;
        return $this;
    }

    /**
     * @param TextStyle $textStyle
     * @return Label
     */
    public function setTextStyle(TextStyle $textStyle): Label
    {
        $this->textStyle = $textStyle;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'show' => $this->isVisible(),
            'textStyle' => $this->getTextStyle(),
            'position' => $this->getPosition(),
            'formatter' => $this->getFormatter(),
        ];
    }
}
