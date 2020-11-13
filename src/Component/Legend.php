<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\Enum\LegendType;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;
use Survik1\Graph\Graphic\TextStyle;

class Legend extends Component
{
    /**
     * @var array
     */
    protected $data = [];
    /**
     * @var string
     */
    protected $left;
    /**
     * @var string
     */
    protected $orient;
    /**
     * @var string
     */
    protected $top;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var TextStyle
     */
    protected $textStyle;
    /**
     * @var array
     */
    protected $selected = [];

    /**
     * @param Component|null $parentObject
     */
    public function __construct(?Component $parentObject = null)
    {
        parent::__construct($parentObject);

        $this->textStyle = (new TextStyle($this))
            ->setPadding(0);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string|null
     */
    public function getLeft(): ?string
    {
        return $this->left;
    }

    /**
     * @return string|null
     */
    public function getOrient(): ?string
    {
        return $this->orient;
    }

    /**
     * @return array
     */
    public function getSelected(): array
    {
        return $this->selected;
    }

    /**
     * @return string|null
     */
    public function getTop(): ?string
    {
        return $this->top;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return TextStyle
     */
    public function getTextStyle(): TextStyle
    {
        return $this->textStyle;
    }

    /**
     * @param string $left
     * @return Legend
     */
    public function setLeft(string $left): Legend
    {
        $this->left = $left;
        return $this;
    }

    /**
     * @param string $orient
     * @return Legend
     */
    public function setOrient(string $orient): Legend
    {
        $this->orient = $orient;
        return $this;
    }

    /**
     * @param string $top
     * @return Legend
     */
    public function setTop(string $top): Legend
    {
        $this->top = $top;
        return $this;
    }

    /**
     * @param string $type
     * @return Legend
     */
    public function setType(string $type): Legend
    {
        if (!in_array($type, [
            LegendType::PLAIN,
            LegendType::SCROLLABLE,
        ])) {
            throw new InvalidArgumentException("Legend type {$type} is not valid");
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @param array $data
     * @return void
     */
    public function setData(array $data): Legend
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param string $index
     * @param bool $value
     * @return Legend
     */
    public function setSelectedIndex(string $index, bool $value = true): Legend
    {
        $this->selected[$index] = $value;
        return $this;
    }

    /**
     * @param array $selected
     * @return Legend
     */
    public function setSelected(array $selected): Legend
    {
        $this->selected = [];
        foreach ($selected as $index => $value) {
            if (is_numeric($index)) {
                $this->selected[$value] = true;
            } else {
                $this->selected[$index] = $value;
            }
        }
        return $this;
    }

    /**
     * @see Legend::setType()
     * @see LegendType
     *
     * @return Legend
     */
    public function setScrollable(): Legend
    {
        $this->setType(LegendType::SCROLLABLE);
        return $this;
    }

    /**
     * @param TextStyle $textStyle
     * @return Legend
     */
     public function setTextStyle(TextStyle $textStyle): Legend
    {
        $this->textStyle = $textStyle;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr = [
            'top' => $this->getTop(),
            'left' => $this->getLeft(),
            'orient' => $this->getOrient(),
            'selected' => $this->getSelected(),
            'textStyle' => $this->getTextStyle(),
        ];

        if ($this->data) {
            $arr['data'] = $this->getData();
        }

        if ($this->type) {
            $arr['type'] = $this->getType();
        }

        return $arr;
    }
}
