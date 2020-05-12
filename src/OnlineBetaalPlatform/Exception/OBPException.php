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

    /**
     * Ensure that when the exception converted into a string we print extra information about the exception
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
