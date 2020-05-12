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

    /** @var \DateTime */
    public $created;

    /** @var \DateTime */
    public $updated;

}
