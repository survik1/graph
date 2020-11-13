<?php
namespace Survik1\Graph\Feature;

use Survik1\Graph\General\Component;

class Feature extends Component
{
    /**
     * @var MagicType
     */
    protected $magicType;
    /**
     * @var Restore
     */
    protected $restore;
    /**
     * @var SaveAsImage
     */
    protected $saveAsImage;
    /**
     * @var bool
     */
    protected $show = true;

    /**
     * @return MagicType
     */
    public function getMagicType(): ?MagicType
    {
        return $this->magicType;
    }

    /**
     * @return Restore
     */
    public function getRestore(): ?Restore
    {
        return $this->restore;
    }

    /**
     * @return SaveAsImage
     */
    public function getSaveAsImage(): ?SaveAsImage
    {
        return $this->saveAsImage;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @param MagicType $magicType
     * @return $this
     */
    public function setMagicType(MagicType $magicType): Feature
    {
        $this->magicType = $magicType;
        return $this;
    }

    /**
     * @param Restore $restore
     * @return Feature
     */
    public function setRestore(Restore $restore): Feature
    {
        $this->restore = $restore;
        return $this;
    }

    /**
     * @param SaveAsImage $saveAsImage
     * @return Feature
     */
    public function setSaveAsImage(SaveAsImage $saveAsImage): Feature
    {
        $this->saveAsImage = $saveAsImage;
        return $this;
    }

    /**
     * @param bool $visibility
     * @return Feature
     */
    public function setVisibility(bool $visibility): Feature
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
            'saveAsImage' => $this->getSaveAsImage(),
            'restore' => $this->getRestore(),
            'magicType' => $this->getMagicType(),
            'show' => $this->isVisible(),
        ];
    }
}
