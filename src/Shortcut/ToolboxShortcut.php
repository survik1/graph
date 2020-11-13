<?php
namespace Survik1\Graph\Shortcut;

use Survik1\Graph\Component\Toolbox;
use Survik1\Graph\Feature\Feature;
use Survik1\Graph\Feature\MagicType;
use Survik1\Graph\Feature\Restore;
use Survik1\Graph\Feature\SaveAsImage;

trait ToolboxShortcut
{
    /**
     * @return Toolbox
     */
    public function enableImageSavingFast(): Toolbox
    {
        if ($this instanceof Toolbox) {
            if (!$this->getFeature()) {
                $this->setFeature(new Feature($this));
            }

            if (!$this->getFeature()->getSaveAsImage()) {
                $this->getFeature()->setSaveAsImage((new SaveAsImage($this->getFeature()))->setVisibility(true));
            } else {
                $this->getFeature()->getSaveAsImage()->setVisibility(true);
            }
        }

        return $this;
    }

    /**
     * @return Toolbox
     */
    public function enableRestoreFast(): Toolbox
    {
        if ($this instanceof Toolbox) {
            if (!$this->getFeature()) {
                $this->setFeature(new Feature($this));
            }

            if (!$this->getFeature()->getRestore()) {
                $this->getFeature()->setRestore(new Restore($this->getFeature()));
            } else {
                $this->getFeature()->getRestore()->setVisibility(true);
            }
        }

        return $this;
    }

    /**
     * @return Toolbox
     */
    public function enableMagicTypeFast(string ...$types): Toolbox
    {
        if ($this instanceof Toolbox) {
            if (!$this->getFeature()) {
                $this->setFeature(new Feature($this));
            }

            if (!$this->getFeature()->getMagicType()) {
                $this->getFeature()->setMagicType((new MagicType($this->getFeature()))->enableType(...$types));
            } else {
                $this->getFeature()->getMagicType()->enableType(...$types);
            }
        }

        return $this;
    }
}
