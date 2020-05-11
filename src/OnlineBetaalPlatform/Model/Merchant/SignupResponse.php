<?php

namespace OnlineBetaalPlatform\Model\Merchant;

/**
 * Class SignupResponse
 */
class SignupResponse
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

    /** @var string */
    public $completed;

    /** @var string */
    public $merchant_uid;

    /** @var string */
    public $return_url;

    /** @var string */
    public $redirect_url;

    /** @var string */
    public $notify_url;
    

}
