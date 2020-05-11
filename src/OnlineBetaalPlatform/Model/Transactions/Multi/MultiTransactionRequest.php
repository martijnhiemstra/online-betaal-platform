<?php

namespace OnlineBetaalPlatform\Model\Payment;

/**
 * Class MultiTransactionRequest
 */
class MultiTransactionRequest
{
    /** @var boolean */
    public $checkout;

    /** @var string */
    public $payment_method;

    /** @var integer */
    public $total_price;

    /** @var string */
    public $return_url;
    
    /** @var string */
    public $notify_url;

    /** @var array|MultiTransaction[] */
    public $transactions = array();

}
