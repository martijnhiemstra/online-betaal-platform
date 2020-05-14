<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use JsonMapper;
use OnlineBetaalPlatform\Exception\TransactionException;
use OnlineBetaalPlatform\Model\Payment\MultiTransactionRequest;
use OnlineBetaalPlatform\Model\Payment\MultiTransactionResponse;

/**
 * Contains methodes to create. modify and get transactions in the OBP system. 
 */
class TransactionsManager
{
    /** @var string */
    private $apiKey;

    /** @var string */
    private $baseApiUrl;

    /** @var JsonMapper */
    private $mapper;

    /**
     * @param string The api key to use when connecting with OBP
     * @param string This is the base url of the environment. Each method in this class will then append there own unique url to this base url.
     */
    public function __construct($apiKey, $baseApiUrl)
    {
        $this->httpClient = new Client();
        $this->apiKey     = $apiKey;
        $this->baseApiUrl = $baseApiUrl;

        $this->mapper = new JsonMapper();
    }

    /**
     * @param MultiTransactionRequest The multi transaction request to send 
     * 
     * @return MultiTransactionResponse The response with the 
     *
     * @throws \Exception
     */
    public function multiTransaction($multiTransactionRequest): MultiTransactionResponse
    {
        try {
            $uri = $this->baseApiUrl . 'multi_transactions';

            $response = $this->httpClient->request('POST', $uri, [
                'auth' => [$this->apiKey, null], 'json' => $multiTransactionRequest
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Expected status code to be 200. Received: ' . $response->getStatusCode());
            }

            $data = json_decode($response->getBody()->getContents());
            return $this->mapper->map($data, new MultiTransactionResponse());
        } catch (RequestException $exception) {
            throw new TransactionException('Unable to create multi transaction: ' . $exception->getResponse()->getBody()->getContents(), $exception->getCode(), $exception);
        } catch (Exception $exception) {
            throw new TransactionException('Unable to create multi transaction: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }


}
