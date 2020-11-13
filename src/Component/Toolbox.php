<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\Feature\Feature;
use Survik1\Graph\General\Component;
use Survik1\Graph\Shortcut\ToolboxShortcut;

class Toolbox extends Component
{
    use ToolboxShortcut;

    /**
     * @var Feature
     */
    protected $feature;

    /**
     * @return Feature|null
     */
    public function getFeature(): ?Feature
    {
        return $this->feature;
    }

    /**
     * @param Feature $feature
     * @return Toolbox
     */
    public function setFeature(Feature $feature): Toolbox
    {
        $this->feature = $feature;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'feature' => $this->getFeature(),
        ];
    }

}
