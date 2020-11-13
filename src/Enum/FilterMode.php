<?php
namespace Survik1\Graph\Enum;

class FilterMode
{
    /**
     * Data that outside the window will be set to NaN, which will not lead to changes of windows of other axes.
     */
    public const EMPTY = 'empty';
    /**
     * Data that outside the window will be filtered, which may lead to some changes of windows of other axes.
     * For each data item, it will be filtered if one of the relevant dimensions is out of the window.
     */
    public const FILTER = 'filter';
    /**
     * Do not filter data.
     */
    public const NONE = 'none';
    /**
     * Data that outside the window will be filtered, which may lead to some changes of windows of other axes.
     * For each data item, it will be filtered only if all of the relevant dimensions are out of the same side of the window.
     */
    public const WEAK_FILTER = 'weakFilter';
}
