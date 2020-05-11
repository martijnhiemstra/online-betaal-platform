<?php

namespace OnlineBetaalPlatform\Model\Merchant;

/**
 * Class SeamlessSignupResponse
 */
class SeamlessSignupResponse
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
