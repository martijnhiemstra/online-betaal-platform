<?php

namespace OnlineBetaalPlatform\Model\Merchant;

use OnlineBetaalPlatform\Model\AbstractResponse;

/**
 * The response when doing a whitelabel signup
 */
class WhitelabelSignupResponse extends AbstractResponse
{
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
