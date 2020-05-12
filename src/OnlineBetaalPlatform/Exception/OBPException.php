<?php

namespace OnlineBetaalPlatform\Exception;

use Exception;

/**
 * This is the super class of all exceptions in this package. It has a helpfull constructor and a toString function
 */
class OBPException extends Exception
{
    
    /**
     * This constructor forces us to pass on a message and allows an optional code and previous exception
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        /* Make sure everything is assigned properly */
        parent::__construct($message, $code, $previous);
    }

}
