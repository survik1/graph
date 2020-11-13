<?php
namespace Survik1\Graph\Series;

use Survik1\Graph\Enum\Sort;
use Survik1\Graph\Enum\SunburstSeriesHighlightPolicy;
use Survik1\Graph\Exception\InvalidArgumentException;
use Survik1\Graph\General\Component;
use Survik1\Graph\General\Series;

class SunburstSeries extends Series
{
    /**
     * @var string
     */
    protected $highlightPolicy = SunburstSeriesHighlightPolicy::CHILDREN;
    /**
     * @var string
     */
    protected $sort = Sort::NONE;

    /**
     * @param string $name
     * @param Component|null $parentObject
     */
    public function __construct(string $name, ?Component $parentObject = null)
    {
        parent::__construct($name, 'sunburst', $parentObject);
    }

    /**
     * @return string
     */
    public function getHighlightPolicy(): string
    {
        return $this->highlightPolicy;
    }

    /**
     * @return string|null
     */
    public function getSort(): ?string
    {
        return $this->sort;
    }

    /**
     * @param string $highlightPolicy
     * @return SunburstSeries
     * @throws InvalidArgumentException
     */
    public function setHighlightPolicy(string $highlightPolicy): SunburstSeries
    {
        if (!in_array($highlightPolicy, [
            SunburstSeriesHighlightPolicy::ANCESTOR,
            SunburstSeriesHighlightPolicy::CHILDREN,
            SunburstSeriesHighlightPolicy::NONE,
            SunburstSeriesHighlightPolicy::ONLY_SELF,
        ])) {
            throw new InvalidArgumentException("Sunburst series highlight policy {$highlightPolicy} is not valid");
        }
        $this->highlightPolicy = $highlightPolicy;
        return $this;
    }

    /**
     * @param string $sort
     * @return SunburstSeries
     * @throws InvalidArgumentException
     */
    public function setSort(string $sort): SunburstSeries
    {
        if (!in_array($sort, [
            Sort::ASC,
            Sort::DESC,
            Sort::NONE,
        ])) {
            throw new InvalidArgumentException("Sunburst series sort {$sort} is not valid");
        }
        $this->sort = $sort;
        return $this;
    }
}
