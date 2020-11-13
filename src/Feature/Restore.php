<?php
namespace Survik1\Graph\Feature;

use Survik1\Graph\General\Component;

class Restore extends Component
{
    /**
     * @var bool
     */
    protected $show = true;
    /**
     * @var string
     */
    protected $title = "Obnovit";

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @param string $title
     * @return Restore
     */
    public function setTitle(string $title): Restore
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param bool $show
     * @return Restore
     */
    public function setVisibility(bool $show): Restore
    {
        $this->show = $show;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'title' => $this->getTitle(),
            'show' => $this->isVisible(),
        ];
    }
}
