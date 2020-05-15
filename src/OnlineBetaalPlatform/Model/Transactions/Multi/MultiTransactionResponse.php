<?php

namespace OnlineBetaalPlatform\Model\Transactions\Multi;

use OnlineBetaalPlatform\Model\AbstractResponse;
use OnlineBetaalPlatform\Model\Status\Status;

/**
 * The response received when sending a multi transaction
 */
class MultiTransactionResponse extends AbstractResponse
{
    /** @var string|null */
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

    /** @var array */
    public $metadata = array();

    /** @var array */
    public $statuses = array();

}
