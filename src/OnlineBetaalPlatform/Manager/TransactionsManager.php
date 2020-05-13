<?php

namespace OnlineBetaalPlatform\Manager;

use GuzzleHttp\Client;

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
        $this->httpClient = new Client();
        $this->apiKey     = $apiKey;
        $this->baseApiUrl = $baseApiUrl;
    }
}
