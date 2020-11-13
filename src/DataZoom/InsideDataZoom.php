<?php
namespace Survik1\Graph\DataZoom;

use Survik1\Graph\General\DataZoom;

class InsideDataZoom extends DataZoom
{
    public function __construct(?Component $parentObject = null)
    {
        parent::__construct("inside", $parentObject);
    }
}
