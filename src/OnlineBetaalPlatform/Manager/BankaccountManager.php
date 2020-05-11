<?php

namespace OnlineBetaalPlatform\Manager;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Class BankaccountManager
 */
class BankaccountManager
{
    /** @var string */
    private $apiKey;

    /**
     * @param ClientInterface $httpClient
     * @param string          $apiKey
     * @param string          $uri
     */
    public function __construct($apiKey)
    {
        $this->httpClient = new Client();
        $this->apiKey     = $apiKey;
    }

}
