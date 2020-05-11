<?php

namespace OnlineBetaalPlatform\Model\Merchant;

/**
 * Class SignupResponse
 */
class SignupResponse
{
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

}
