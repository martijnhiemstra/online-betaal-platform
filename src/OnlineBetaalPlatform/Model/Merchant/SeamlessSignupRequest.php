<?php

namespace OnlineBetaalPlatform\Model\Merchant;

/**
 * The request when signing up a merchant using seamless mode
 */
class SeamlessSignupRequest
{
    /** @var string */
    public $type = 'business';

    /** @var string */
    public $coc_nr;

    /** @var string */
    public $country;

    /** @var string */
    public $emailaddress;

    /** @var string */
    public $notify_url;
    
}
