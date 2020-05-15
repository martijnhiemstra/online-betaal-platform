<?php

namespace OnlineBetaalPlatform\Model\BankAccount;

use OnlineBetaalPlatform\Model\AbstractResponse;

class BankAccountResponse extends AbstractResponse
{

    /** @var string|null */
    public $verified;

    /** @var string */
    public $verification_url;

    /** @var string|null */
    public $reference;

    /** @var string */
    public $return_url;

    /** @var string */
    public $notify_url;

    /** @var boolean */
    public $is_default;

}
