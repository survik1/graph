<?php
namespace Survik1\Graph\General;

use JsonSerializable;

abstract class Component implements JsonSerializable
{
    /**
     * @var Component
     */
    protected $parentObject;

    /**
     * @param Component|null $parentObject
     */
    public function __construct(?Component $parentObject = null)
    {
        $this->parentObject = $parentObject;
    }

    /**
     * @return array
     */
    abstract public function jsonSerialize(): array;

    /**
     * @return Component|null
     */
    public function getParent(): ?Component
    {
        return $this->parentObject;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this);
    }
}
