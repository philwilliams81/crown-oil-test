<?php

namespace App;

use App\MaintenceHelper;

/**
 * MaintenceMode
 */
class MaintenceMode
{    
    /**
     * helper - container for our helper App\MaintenceHelper object
     *
     * @var mixed
     */
    private $helper;
 

    /**
     * __construct
     *
     * @param  mixed $helper
     * @return void
     */
    public function __construct(MaintenceHelper $helper)
    {
        $this->helper = $helper;
    }
    

    /**
     * getReason Returns a formatted reason for the environment being down from the App\MaintenceHelper object
     *
     * @return string
     */
    public function getReason(): string
    {
        return "Sorry we are down: " . $this->helper->getReason();
    }

    
    /**
     * isUp - Returns the 'up' state of the environment from the App\MaintenceHelper object
     *
     * @return bool
     */
    public function isUp(): bool
    {
        return $this->helper->isUp();
    }
}
