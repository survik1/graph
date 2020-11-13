<?php
namespace Survik1\Graph;

use Survik1\Graph\Component\Axis;
use Survik1\Graph\Component\Grid;
use Survik1\Graph\Component\Legend;
use Survik1\Graph\Component\Radar;
use Survik1\Graph\Component\Title;
use Survik1\Graph\Component\Toolbox;
use Survik1\Graph\Component\Tooltip;
use Survik1\Graph\General\Component;
use Survik1\Graph\General\DataZoom;
use Survik1\Graph\General\Series;
use Survik1\Graph\Shortcut\GraphShortcut;
use Latte\Engine;

class Graph extends Component
{
    use GraphShortcut;

    /**
     * @var string
     */
    private $id;
    /**
     * @var DataZoom[]
     */
    protected $dataZoom = [];
    /**
     * @var Grid
     */
    protected $grid;
    /**
     * @var Legend|null
     */
    protected $legend;
    /**
     * @var Radar|null
     */
    protected $radar;
    /**
     * @var Series[]
     */
    protected $series = [];
    /**
     * @var Title|null
     */
    protected $title;
    /**
     * @var Toolbox|null
     */
    protected $toolbox;
    /**
     * @var Tooltip|null
     */
    protected $tooltip;
    /**
     * @var Axis[]
     */
    protected $xAxis = [];
    /**
     * @var Axis[]
     */
    protected $yAxis = [];

    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        parent::__construct(null);
        $this->id = $id;
        $this->grid = new Grid($this);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return DataZoom[]
     */
    public function getDataZoom(): array
    {
        return $this->dataZoom;
    }

    /**
     * @return Grid
     */
    public function getGrid(): Grid
    {
        return $this->grid;
    }

    /**
     * @return Legend|null
     */
    public function getLegend(): ?Legend
    {
        return $this->legend;
    }

    /**
     * @return Radar
     */
    public function getRadar(): ?Radar
    {
        return $this->radar;
    }

    /**
     * @return array
     */
    public function getSeries(): array
    {
        return $this->series;
    }

    /**
     * @return Title|null
     */
    public function getTitle(): ?Title
    {
        return $this->title;
    }

    /**
     * @return Toolbox
     */
    public function getToolbox(): ?Toolbox
    {
        return $this->toolbox;
    }

    /**
     * @return Tooltip
     */
    public function getTooltip(): ?Tooltip
    {
        return $this->tooltip;
    }

    /**
     * @return array
     */
    public function getXAxis(): array
    {
        return $this->xAxis;
    }

    /**
     * @return array
     */
    public function getYAxis(): array
    {
        return $this->yAxis;
    }

    /**
     * @param Grid $grid
     * @return Graph
     */
    public function setGrid(Grid $grid): Graph
    {
        $this->grid = $grid;
        return $this;
    }

    /**
     * @param Legend|null $legend
     * @return Graph
     */
    public function setLegend(?Legend $legend): Graph
    {
        $this->legend = $legend;
        return $this;
    }

    /**
     * @param Radar $radar
     * @return Graph
     */
    public function setRadar(Radar $radar): Graph
    {
        $this->radar = $radar;
        return $this;
    }

    /**
     * @param Title $title
     * @return Graph
     */
    public function setTitle(Title $title): Graph
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param Toolbox $toolbox
     * @return Graph
     */
    public function setToolbox(Toolbox $toolbox): Graph
    {
        $this->toolbox = $toolbox;
        return $this;
    }

    /**
     * @param Tooltip $tooltip
     * @return Graph
     */
    public function setTooltip(Tooltip $tooltip): Graph
    {
        $this->tooltip = $tooltip;
        return $this;
    }

    /**
     * @param DataZoom $dataZoom
     * @return Graph
     */
    public function addDataZoom(DataZoom $dataZoom): Graph
    {
        $this->dataZoom[] = $dataZoom;
        return $this;
    }

    /**
     * @param Series $series
     * @return Graph
     */
    public function addSeries(Series $series): Graph
    {
        $this->series[] = $series;
        return $this;
    }

    /**
     * @param Axis $axis
     * @return Graph
     */
    public function addXAxis(Axis $axis): Graph
    {
        $axis->setIndex(count($this->xAxis));
        $this->xAxis[] = $axis;
        return $this;
    }

    /**
     * @param Axis $axis
     * @return Graph
     */
    public function addYAxis(Axis $axis): Graph
    {
        $axis->setIndex(count($this->yAxis));
        $this->yAxis[] = $axis;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $arr =  [
            'responsive' => true,
            'maintainAspectRatio' => true,
            'dataZoom' => $this->getDataZoom(),
            'title' => $this->getTitle(),
            'tooltip' => $this->getTooltip(),
            'toolbox' => $this->getToolbox(),
            'xAxis' => $this->getXAxis(),
            'yAxis' => $this->getYAxis(),
            'series' => $this->getSeries(),
            'grid' => $this->getGrid(),
        ];

        if ($this->getLegend()) {
            $arr['legend'] = $this->getLegend();
        }

        if ($this->getRadar()) {
            $arr['radar'] = $this->getRadar();
        }


        return $arr;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $latte = new Engine;
        $parameters = [
            'id' => $this->id,
            'uuid' => random_int(10e3, 10e10),
            'jsonData' => json_encode($this),
        ];

        $parameters['jsonData'] = str_replace(['"__FORMATTER_START__' , '__FORMATTER_END__"'], "", $parameters['jsonData']);
        $parameters['jsonData'] = str_replace('\\\\', '\\', $parameters['jsonData']);

        return $latte->renderToString(__DIR__ . '/graph.latte', $parameters);
    }
}
