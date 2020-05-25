<?php

namespace OnlineBetaalPlatform\Model\Transactions\Multi;

/**
 * Class MultiTransactionRequest
 */
class MultiTransactionRequest
{
    /** @var boolean */
    public $checkout = false; // Multitransaction doesn't support checkout

    /** @var string */
    public $payment_method;

    /** @var integer */
    public $total_price;

    /** @var string */
    public $return_url;

    /** @var string */
    public $notify_url;

    /** @var integer */
    public $partner_fee;

    /** @var OnlineBetaalPlatform\Model\Transactions\Multi\MultiTransactionRequestTransaction[] */
    public $transactions = array();

    /** @var Object[] */
    public $metadata = array();
}
