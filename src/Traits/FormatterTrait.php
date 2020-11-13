<?php
namespace Survik1\Graph\Traits;

use Survik1\Graph\General\Component;

trait FormatterTrait
{
    /**
     * @var string
     */
    protected $formatter;
    /**
     * @var bool
     */
    protected $javascript = false;

    /**
     * @param string $formatter
     * @return Component
     */
    public function setFormatterString(string $formatter): Component
    {
        $this->formatter = $formatter;
        $this->javascript = false;
        return $this;
    }

    /**
     * @param string $formatter
     * @return Component
     */
    public function setFormatterJavascript(string $formatter): Component
    {
        $this->formatter = $formatter;
        $this->javascript = true;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormatterNative(): ?string
    {
        return $this->formatter;
    }

    /**
     * @return string|null
     */
    public function getFormatter(): ?string
    {
        if ($this->javascript && $this->formatter !== null) {
            return '__FORMATTER_START__' .  str_replace('"', "'", $this->formatter) . '__FORMATTER_END__';
        } else {
            return $this->formatter;
        }
    }
}
