<?php
namespace Survik1\Graph\Enum;

class SunburstSeriesHighlightPolicy
{
    /**
     * If highlightPolicy is 'ancestor', then the sector and its ancestors will be highlighted.
     */
    public const ANCESTOR = 'ancestor';
    /**
     * If highlightPolicy is set to be 'descendant', then the sector and its descendant will be highlighted, and others will be downplayed.
     */
    public const CHILDREN = 'descendant';
    /**
     * If highlightPolicy is set to be 'self', then the sector will be highlighted and others downplayed.
     */
    public const ONLY_SELF = 'self';
    /**
     * If highlightPolicy is set to be 'none', then others will not be downplayed.
     */
    public const NONE = 'none';
}
