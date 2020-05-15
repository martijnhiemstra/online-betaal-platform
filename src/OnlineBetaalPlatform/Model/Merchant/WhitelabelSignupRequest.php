<?php

namespace OnlineBetaalPlatform\Model\Merchant;

/**
 * The request sent when signing up a merchant using the whitelabel option 
 */
class WhitelabelSignupRequest
{
    /** @var string */
    public $merchantUid;

    /** @var string */
    public $type = 'business';

    /** @var string */
    public $return_url;

    /** @var string */
    public $notify_url;
    
}
