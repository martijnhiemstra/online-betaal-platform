<?php

namespace OnlineBetaalPlatform\Model\BankAccount;

/**
 * The request sent when creating a bankaccount 
 */
class CreateBankAccountRequest
{
    /** @var string */
    public $return_url;

    /** @var string */
    public $notify_url;
    
}
