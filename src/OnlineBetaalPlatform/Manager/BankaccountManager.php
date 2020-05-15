<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use OnlineBetaalPlatform\Exception\BankAccountException;
use OnlineBetaalPlatform\Model\BankAccount\BankAccountResponse;
use OnlineBetaalPlatform\Model\BankAccount\BankAccountsResponse;
use OnlineBetaalPlatform\Model\BankAccount\CreateBankAccountRequest;
use OnlineBetaalPlatform\Model\Merchant\WhitelabelSignupRequest;
use OnlineBetaalPlatform\Utils\RequestUtils;

/**
 * Contains methods that allow us to create, modify and get bankaccounts in the OBP system
 */
class BankaccountManager
{
    /** @var string */
    private $apiKey;

    /** @var string */
    private $baseApiUrl;

    /**
     * @param string The api key to use when connecting with OBP
     * @param string This is the base url of the environment. Each method in this class will then append there own unique url to this base url.
     */
    public function __construct($apiKey, $baseApiUrl)
    {
        $this->apiKey     = $apiKey;
        $this->baseApiUrl = $baseApiUrl;
    }

    /**
     * @param string The id of the merchant we want to create the bankaccount for
     * @param WhitelabelSignupRequest The request to send when creating a merchant using the whitelabel signup 
     * 
     * @return BankAccountResponse The object created using the reponse received from the OPP system.
     *
     * @throws BankAccountException
     */
    public function create(String $merchantUid, CreateBankAccountRequest $createBankAccountRequest): BankAccountResponse
    {
        try {
            $uri = $this->baseApiUrl . 'merchants/' . $merchantUid  . '/bank_accounts';

            return RequestUtils::doCall($uri, 'POST', $this->apiKey, $createBankAccountRequest, new BankAccountResponse());
        } catch (Exception $exception) {
            throw new BankAccountException('Unable to create bankaccount: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string The id of the merchant we want to create the bankaccount for
     * @param string The id of the bankaccount we want to find
     * 
     * @return BankAccountResponse The bankaccount object
     *
     * @throws BankAccountException If anything went wrong
     */
    public function findById($merchantUid, $bankaccountUid): BankAccountResponse
    {
        try {
            $uri = $this->baseApiUrl . 'merchants/' . $merchantUid  . '/bank_accounts/' . $bankaccountUid;

            return RequestUtils::doCall($uri, 'GET', $this->apiKey, null, new BankAccountResponse());
        } catch (Exception $exception) {
            throw new BankAccountException('Unable to find bankaccount: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string The id of the merchant we want to create the bankaccount for
     * 
     * @return BankAccountsResponse An object containing a list of bankaccounts
     *
     * @throws BankAccountException If anything wene
     */
    public function findAll($merchantUid): BankAccountsResponse
    {
        try {
            $uri = $this->baseApiUrl . 'merchants/' . $merchantUid  . '/bank_accounts';

            return RequestUtils::doCall($uri, 'GET', $this->apiKey, null, new BankAccountsResponse());
        } catch (Exception $exception) {
            throw new BankAccountException('Unable to find bankaccounts: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
