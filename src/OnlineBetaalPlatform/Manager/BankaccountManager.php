<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use GuzzleHttp\Client;
use OnlineBetaalPlatform\Exception\BankAccountException;
use OnlineBetaalPlatform\Model\BankAccount\CreateBankAccountResponse;

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
        $this->httpClient = new Client();
        $this->apiKey     = $apiKey;
        $this->baseApiUrl = $baseApiUrl;
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
    public function create($merchantUid, $returnUrl, $notifyUrl): CreateBankAccountResponse
    {
        try {
            $uri = $this->baseApiUrl . '/merchants/' . $merchantUid  . '/bank_accounts';

            $response = $this->httpClient->request('POST', $uri, [
                'auth' => [$this->apiKey, null], 'form_params' => [
                    'return_url'    => $returnUrl,
                    'notify_url'    => $notifyUrl,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Invalid response');
            }

            $signupResponse = json_decode($response->getBody()->getContents());

            return $signupResponse;
        } catch (Exception $exception) {
            throw new BankAccountException('Unable to ceate bankaccount: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
