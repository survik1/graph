<?php
namespace Survik1\Graph\Enum;

class TooltipTrigger
{
    /**
     * Triggered by data item, which is mainly used for charts that don't
     * have a category axis like scatter charts or pie charts.
     */
    public const ITEM = 'item';
    /**
     * Triggered by axes, which is mainly used for charts that have category axes, like bar charts or line charts.
     */
    public const AXIS = 'axis';
    /**
     * Triggered by nothing.
     */
    public const NONE = 'none';
}
