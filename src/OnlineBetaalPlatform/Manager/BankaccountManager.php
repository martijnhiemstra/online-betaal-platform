<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use GuzzleHttp\Client;
use JsonMapper;
use OnlineBetaalPlatform\Exception\BankAccountException;
use OnlineBetaalPlatform\Model\BankAccount\BankAccount;
use OnlineBetaalPlatform\Model\BankAccount\BankAccounts;

/**
 * Contains methods that allow us to create, modify and get bankaccounts in the OBP system
 */
class BankaccountManager
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
     * @param string The id of the merchant we want to create the bankaccount for
     * @param string The url visitors will return to after the bankaccount is verified
     * @param string The url that will be used to notify us when something changes
     * 
     * @return The object created using the reponse received from the OBP system.
     *
     * @throws BankAccountException
     */
    public function create($merchantUid, $returnUrl, $notifyUrl): BankAccount
    {
        try {
            $uri = $this->baseApiUrl . 'merchants/' . $merchantUid  . '/bank_accounts';

            $response = $this->httpClient->request('POST', $uri, [
                'auth' => [$this->apiKey, null], 'form_params' => [
                    'return_url'    => $returnUrl,
                    'notify_url'    => $notifyUrl,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Invalid response');
            }

            $data = json_decode($response->getBody()->getContents());
            return $this->mapper->map($data, new BankAccount());
        } catch (Exception $exception) {
            throw new BankAccountException('Unable to create bankaccount: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string The id of the merchant we want to create the bankaccount for
     * @param string The url visitors will return to after the bankaccount is verified
     * @param string The url that will be used to notify us when something changes
     * 
     * @return The object created using the reponse received from the OBP system.
     *
     * @throws BankAccountException
     */
    public function findById($merchantUid, $bankaccountUid): BankAccount
    {
        try {
            $uri = $this->baseApiUrl . 'merchants/' . $merchantUid  . '/bank_accounts/' . $bankaccountUid;

            $response = $this->httpClient->request('GET', $uri, [
                'auth' => [$this->apiKey, null]
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Invalid response');
            }

            $data = json_decode($response->getBody()->getContents());
            return $this->mapper->map($data, new BankAccount());
        } catch (Exception $exception) {
            throw new BankAccountException('Unable to get bankaccount ' . $bankaccountUid . ': ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string The id of the merchant we want to create the bankaccount for
     * @param string The url visitors will return to after the bankaccount is verified
     * @param string The url that will be used to notify us when something changes
     * 
     * @return The object created using the reponse received from the OBP system.
     *
     * @throws BankAccountException
     */
    public function findAll($merchantUid): BankAccounts
    {
        try {
            $uri = $this->baseApiUrl . 'merchants/' . $merchantUid  . '/bank_accounts';

            $response = $this->httpClient->request('GET', $uri, [
                'auth' => [$this->apiKey, null]
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Invalid response');
            }

            $data = json_decode($response->getBody()->getContents());
            return $this->mapper->map($data, new BankAccounts());
        } catch (Exception $exception) {
            throw new BankAccountException('Unable to get bankaccounts: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
