<?php
namespace Survik1\Graph\Feature;

use Survik1\Graph\Enum\ImageType;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;

class SaveAsImage extends Component
{
    /**
     * @var string
     */
    protected $type = "png";
    /**
     * @var bool
     */
    protected $show = true;
    /**
     * @var string
     */
    protected $title = "Stáhnout";

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

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
     * @param string $type
     * @return SaveAsImage
     */
    public function setType(string $type): SaveAsImage
    {
        if (!in_array($type, [
            ImageType::PNG,
            ImageType::JPEG,
        ])) {
            throw new InvalidArgumentException("Image type {$type} is not valid");
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $title
     * @return SaveAsImage
     */
    public function setTitle(string $title): SaveAsImage
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param bool $visibility
     * @return SaveAsImage
     */
    public function setVisibility(bool $visibility): SaveAsImage
    {
        $this->show = $visibility;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'show' => $this->isVisible(),
        ];
    }

}
