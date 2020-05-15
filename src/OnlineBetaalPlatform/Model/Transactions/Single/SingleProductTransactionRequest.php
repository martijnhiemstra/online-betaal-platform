<?php

namespace OnlineBetaalPlatform\Model\Transactions\Single;

use OnlineBetaalPlatform\Model\Product;

/**
 * Class SingleProductTransactionRequest
 */
class SingleProductTransactionRequest
{
    /** @var string */
    public $merchant_uid;

    /** @var string */
    public $buyer_name_first;

    /** @var string */
    public $buyer_name_last;

    /** @var string */
    public $buyer_emailaddress;
    
    /** @var array|Product[] */
    public $products = array();

    /** @var integer */
    public $shipping_costs = 0;

    /** @var integer */
    public $total_price;

    /** @var string */
    public $return_url;

    /** @var string */
    public $notify_url;

    /** @var array|Object[] */
    public $metadata = array();    

}
