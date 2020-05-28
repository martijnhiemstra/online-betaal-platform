<?php

namespace OnlineBetaalPlatform\Model\Transactions\Single;

use OnlineBetaalPlatform\Model\AbstractResponse;

class SingleTransaction extends AbstractResponse
{
    /** @var string */
    public $merchant_uid;

    /** @var string */
    public $merchant_profile_uid;

    /** @var integer */
    public $total_price;

    /** @var integer */
    public $shipping_cost;

    /** @var integer */
    public $partner_fee;

    /** @var integer */
    public $payment_details;

    /** @var string */
    public $return_url;

    /** @var string */
    public $redirect_url;

    /** @var string */
    public $notify_url;

    /** @var array */
    // Object[]
    public $metadata = array();

    /** @var array */
    // Status[]
    public $statuses = array();
    
}
