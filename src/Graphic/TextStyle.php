<?php
namespace Survik1\Graph\Graphic;

use Survik1\Graph\Enum\FontWeight;
use Survik1\Graph\General\Component;
use Survik1\Graph\General\Style;

class TextStyle extends Style
{
    /**
     * @var string
     */
    protected $backgroundColor = 'transparent';
    /**
     * @var int
     */
    protected $borderRadius = 0;
    /**
     * @var string
     */
    protected $fontFamily = 'sans-serif';
    /**
     * @var int
     */
    protected $fontSize = 12;
    /**
     * @var string
     */
    protected $fontWeight = FontWeight::NORMAL;
    /**
     * @var int
     */
    protected $padding = 5;

    /**
     * @param Component|null $parentObject
     */
    public function __construct(?Component $parentObject = null)
    {
        parent::__construct($parentObject);
        $this->color = "black";
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @return int
     */
    public function getBorderRadius(): int
    {
        return $this->borderRadius;
    }

    /**
     * @return string
     */
    public function getFontFamily(): string
    {
        return $this->fontFamily;
    }

    /**
     * @return int
     */
    public function getFontSize(): int
    {
        return $this->fontSize;
    }

    /**
     * @return string
     */
    public function getFontWeight(): string
    {
        return $this->fontWeight;
    }

    /**
     * @return int
     */
    public function getPadding(): int
    {
        return $this->padding;
    }

    /**
     * @param string $backgroundColor
     * @return TextStyle
     */
    public function setBackgroundColor(string $backgroundColor): TextStyle
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @param int $borderRadius
     * @return TextStyle
     */
    public function setBorderRadius(int $borderRadius): TextStyle
    {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    /**
     * @param string $fontFamily
     * @return TextStyle
     */
    public function setFontFamily(string $fontFamily): TextStyle
    {
        $this->fontFamily = $fontFamily;
        return $this;
    }

    /**
     * @param int $fontSize
     * @return TextStyle
     */
    public function setFontSize(int $fontSize): TextStyle
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @param string $fontWeight
     * @return TextStyle
     */
    public function setFontWeight(string $fontWeight): TextStyle
    {
        $this->fontWeight = $fontWeight;
        return $this;
    }

    /**
     * @param int $padding
     * @return TextStyle
     */
    public function setPadding(int $padding): TextStyle
    {
        $this->padding = $padding;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = parent::jsonSerialize();
        return array_merge($arr, [
            'backgroundColor' => $this->getBackgroundColor(),
            'borderRadius' => $this->getBorderRadius(),
            'fontFamily' => $this->getFontFamily(),
            'fontSize' => $this->getFontSize(),
            'fontWeight' => $this->getFontWeight(),
            'padding' => $this->getPadding(),
        ]);
    }
}
