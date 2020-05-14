<?php

namespace OnlineBetaalPlatform\Model\Payment;

use OnlineBetaalPlatform\Model\AbstractResponse;

/**
 * The response received when sending a multi transaction
 */
class MultiTransactionResponse extends AbstractResponse
{
    /** @var string */
    public $completed;

    /** @var boolean */
    public $checkout;

    /** @var string */
    public $payment_method;

    /** @var string */
    public $payment_flow;

    /** @var integer */
    public $amount;

    /** @var string */
    public $return_url;

    /** @var string */
    public $redirect_url;

    /** @var string */
    public $notify_url;
}
