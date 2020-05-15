<?php

namespace OnlineBetaalPlatform\Model\BankAccount;

class BankAccountsResponse 
{

    /** @var string */
    public $object;

    /** @var string */
    public $url;

    /** @var boolean */
    public $has_more;

    /** @var integer */
    public $total_item_count;

    /** @var integer */
    public $items_per_page;

    /** @var integer */
    public $current_page;

    /** @var integer */
    public $last_page;

    /** @var BankAccount[] */
    public $data;

}
