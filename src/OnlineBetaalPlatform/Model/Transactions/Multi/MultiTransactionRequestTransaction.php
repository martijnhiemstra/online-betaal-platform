<?php

namespace OnlineBetaalPlatform\Model\Transactions\Multi;

use OnlineBetaalPlatform\Model\Product;

class MultiTransactionRequestTransaction
{
    /** @var string */
    public $merchant_uid;

    /** @var integer */
    public $total_price;

    /** @var integer */
    public $shipping_costs = 0;

    /** @var integer */
    public $partner_fee = 0;

    /** @var array|Product[] */
    public $products = array();

    /** @var array|Object[] */
    public $metadata = array();

}
