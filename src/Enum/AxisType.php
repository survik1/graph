<?php
namespace Survik1\Graph\Enum;

class AxisType
{
    /**
     * Category axis, suitable for discrete category data.
     * Data should only be set via data for this type.
     */
    public const CATEGORY = 'category';
    /**
     * Log axis, suitable for log data.
     */
    public const LOGARITHMIC = 'log';
    /**
     * Time axis, suitable for continuous time series data.
     * As compared to value axis, it has a better formatting for
     * time and a different tick calculation method. For example, it decides
     * to use month, week, day or hour for tick based on the range of span.
     */
    public const TIME = 'time';
    /**
     * Numerical axis, suitable for continuous data.
     */
    public const VALUE = 'value';
}
