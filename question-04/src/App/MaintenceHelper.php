<?php

namespace App;

/**
 * MaintenceHelper
 */
class MaintenceHelper
{
    /**
     * up - container for our 'up' state
     *
     * @var mixed
     */
    private $up;


    /**
     * reason - container for the reason the environment is down
     *
     * @var mixed
     */
    private $reason;


    /**
     * __construct
     *
     * @param  mixed $isUp The 'up' state of the environment
     * @param  mixed $reason The reason the environment is down
     * @return void
     */
    public function __construct(bool $isUp, string $reason)
    {
        $this->setUp($isUp);
        $this->setReason($reason);
    }

    
    /**
     * setUp Set the 'up' state of the environment
     *
     * @param  mixed $up
     * @return void
     */
    public function setUp(bool $up ){
        $this->up = $up;
    }
    

    /**
     * setReason Set the reason the environment is down
     *
     * @param  mixed $reason
     * @return void
     */
    public function setReason(string $reason ){
        $this->reason = $reason;
    }

    /**
     * isUp - Returns the state of the environment
     *
     * @return bool
     */
    public function isUp(): bool
    {
        return $this->up;
    }


    /**
     * getReason Returns the reason for the environment being down
     *
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }
}
