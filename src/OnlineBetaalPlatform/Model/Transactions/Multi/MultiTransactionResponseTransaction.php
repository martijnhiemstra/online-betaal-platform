<?php

namespace OnlineBetaalPlatform\Model\Transactions\Multi;

use OnlineBetaalPlatform\Model\AbstractResponse;

class MultiTransactionResponseTransaction extends AbstractResponse
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

    /** @var Object[] */
    public $metadata = array();

    /** @var OnlineBetaalPlatform\Model\Status\Status[] */
    public $statuses = array();
    

}
