<?php

namespace OnlineBetaalPlatform\Model\Merchant;

use OnlineBetaalPlatform\Model\AbstractResponse;

/**
 * The response when doing a seamless signup
 */
class SeamlessSignupResponse extends AbstractResponse
{
    /** @var string */
    public $type;

    /** @var string */
    public $coc_nr;

    /** @var string */
    public $name;

    /** @var string */
    public $vat_nr;

    /** @var string */
    public $country;

    /** @var string */
    public $notify_url;
    
}
