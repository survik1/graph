<?php
namespace Survik1\Graph\Graphic;

use Survik1\Graph\General\Component;

class AxisLabel extends Component
{
    /**
     * @var bool
     */
    protected $show = true;
    /**
     * @var string
     */
    protected $formatter = "{value}";

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @return string
     */
    public function getFormatter(): string
    {
        return $this->formatter;
    }

    /**
     * @param bool $show
     * @return AxisLabel
     */
    public function setVisibility(bool $show): AxisLabel
    {
        $this->show = $show;
        return $this;
    }

    /**
     * @param string $postfix
     * @return AxisLabel
     */
    public function setPostfix(string $postfix): AxisLabel
    {
        $this->formatter = "{value} $postfix";
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'show' => $this->isVisible(),
            'formatter' => $this->getFormatter(),
        ];
    }
}
