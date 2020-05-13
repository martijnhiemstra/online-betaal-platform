<?php

namespace OnlineBetaalPlatform\Model\BankAccount;

use OnlineBetaalPlatform\Model\AbstractResponse;

class BankAccount extends AbstractResponse
{

    /** @var string|null */
    public $verified;

    /** @var string */
    public $verification_url;

    /** @var string */
    public $reference;

    /** @var string */
    public $return_url;

    /** @var string */
    public $notify_url;

    /** @var boolean */
    public $is_default;

}
