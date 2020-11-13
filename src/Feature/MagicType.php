<?php
namespace Survik1\Graph\Feature;

use Survik1\Graph\Enum\MagicTypeType;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;

class MagicType extends Component
{
    /**
     * @var bool
     */
    protected $show = true;
    /**
     * @var array
     */
    protected $type = [];

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->show;
    }

    /**
     * @param string $types
     * @return MagicType
     * @throws InvalidArgumentException
     */
    public function enableType(string ...$types): MagicType
    {
        foreach ($types as $type) {
            if (!in_array($type, [
                MagicTypeType::BAR,
                MagicTypeType::LINE,
                MagicTypeType::STACK,
                MagicTypeType::TILED,
            ])) {
                throw new InvalidArgumentException("MagicType type {$type} is not valid");
            }
            $this->setType($type, true);
        }
        return $this;
    }

    /**
     * @param string $types
     * @return MagicType
     * @throws InvalidArgumentException
     */
    public function disableType(string $types): MagicType
    {
        foreach ($types as $type) {
            if (!in_array($type, [
                MagicTypeType::BAR,
                MagicTypeType::LINE,
                MagicTypeType::STACK,
                MagicTypeType::TILED,
            ])) {
                throw new InvalidArgumentException("MagicType type {$type} is not valid");
            }
            $this->setType($type, false);
        }
        return $this;
    }

    /**
     * @param string $type
     * @param bool $enable
     * @return void
     */
    protected function setType(string $type, bool $enable): void
    {
        if ($enable && !in_array($type, $this->type)) {
            $this->type[] = $type;
        } elseif (!$enable && in_array($type, $this->type)) {
            if (($key = array_search($type, $this->type)) !== false) {
                unset($this->type[$key]);
            }
        }
    }

    /**
     * @param bool $visible
     * @return MagicType
     */
    public function setVisibility(bool $visible): MagicType
    {
        $this->show = $visible;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'show' => $this->isVisible(),
            'type' => $this->getTypes(),
        ];
    }

}
