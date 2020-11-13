<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\General\Component;
use Survik1\Graph\Graphic\TextStyle;

class Name extends Component
{
    /**
     * @var TextStyle
     */
    protected $textStyle;

    /**
     * @return TextStyle
     */
    public function getTextStyle(): TextStyle
    {
        return $this->textStyle;
    }

    /**
     *
     * @param TextStyle $textStyle
     * @return Name
     */
    public function setTextStyle(TextStyle $textStyle): Name
    {
        $this->textStyle = $textStyle;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = [];

        if ($this->getTextStyle()) {
            $arr['textStyle'] = $this->getTextStyle();
        }

        return $arr;
    }
}
