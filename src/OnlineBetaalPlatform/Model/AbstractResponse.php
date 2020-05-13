<?php

namespace OnlineBetaalPlatform\Model;

abstract class AbstractResponse
{

    /** @var boolean */
    public $livemode;

    /** @var string */
    public $uid;

    /** @var string */
    public $object;

    /** @var string */
    public $status;

    /** @var integer */
    public $created;

    /** @var integer */
    public $updated;

}
