<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\General\Component;

class Grid extends Component
{
    /**
     * @var string
     */
    protected $bottom = "60";
    /**
     * @var string
     */
    protected $left = "10%";
    /**
     * @var string
     */
    protected $right = "10%";
    /**
     * @var string
     */
    protected $top = "60";

    /**
     * @return string|null
     */
    public function getBottom(): ?string
    {
        return $this->bottom;
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
    public function getRight(): ?string
    {
        return $this->right;
    }

    /**
     * @return string|null
     */
    public function getTop(): ?string
    {
        return $this->top;
    }

    /**
     * @param string $bottom
     * @return Grid
     */
    public function setBottom(string $bottom): Grid
    {
        $this->bottom = $bottom;
        return $this;
    }

    /**
     * @param string $left
     * @return Grid
     */
    public function setLeft(string $left): Grid
    {
        $this->left = $left;
        return $this;
    }

    /**
     * @param string $right
     * @return Grid
     */
    public function setRight(string $right): Grid
    {
        $this->right = $right;
        return $this;
    }

    /**
     * @param string $top
     * @return Grid
     */
    public function setTop(string $top): Grid
    {
        $this->top = $top;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'bottom' => $this->getBottom(),
            'left' => $this->getLeft(),
            'right' => $this->getRight(),
            'top' => $this->getTop(),
        ];
    }
}
