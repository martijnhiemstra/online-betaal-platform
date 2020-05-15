<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use OnlineBetaalPlatform\Exception\TransactionException;
use OnlineBetaalPlatform\Model\Transactions\Multi\MultiTransactionRequest;
use OnlineBetaalPlatform\Model\Transactions\Multi\MultiTransactionResponse;
use OnlineBetaalPlatform\Utils\RequestUtils;

/**
 * Contains methodes to create. modify and get transactions in the OBP system. 
 */
class TransactionsManager
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
     * @param MultiTransactionRequest The multi transaction request to send 
     * 
     * @return MultiTransactionResponse The response received from OPP 
     *
     * @throws TransactionException If anything went wrong
     */
    public function multiTransaction(MultiTransactionRequest $multiTransactionRequest): MultiTransactionResponse
    {
        try {
            $uri = RequestUtils::createUrl($this->baseApiUrl, '/multi_transactions');

            return RequestUtils::doCall($uri, 'POST', $this->apiKey, $multiTransactionRequest, new MultiTransactionResponse());
        } catch (Exception $exception) {
            throw new TransactionException('Unable to perform seasmless onboarding: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param String The id of the multi transaction to look for
     * 
     * @return MultiTransactionResponse The requested multi transaction
     */
    public function findMultiTransactionByMultiTransactionId($multi_transaction_uid): MultiTransactionResponse {
        try {
            $uri = RequestUtils::createUrl($this->baseApiUrl, '/multi_transactions/' . $multi_transaction_uid);

            return RequestUtils::doCall($uri, 'GET', $this->apiKey, null, new MultiTransactionResponse());
        } catch (Exception $exception) {
            throw new TransactionException('Unable to find multi transaction id: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
