<?php
namespace Survik1\Graph\Component;

use Survik1\Graph\General\Component;

class Title extends Component
{
    /**
     * @var string
     */
    protected $text;
    /**
     * @var string
     */
    protected $subText;

    /**
     * @param string            $title
     * @param Component|null    $parentObject
     */
    public function __construct(string $title, ?Component $parentObject = null)
    {
        parent::__construct($parentObject);
        $this->text = $title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string|null
     */
    public function getSubText(): ?string
    {
        return $this->subText;
    }

    /**
     * @param string $text
     * @return Title
     */
    public function setText(string $text): Title
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string|null $subText
     * @return Title
     */
    public function setSubText(?string $subText): Title
    {
        $this->subText = $subText;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'text' => $this->getText(),
            'subtext' => $this->getSubText(),
            'x' => 'center',
        ];
    }
}
