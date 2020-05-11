<?php

namespace OnlineBetaalPlatform\Manager;

use GuzzleHttp\ClientInterface;

/**
 * Class BankaccountManager
 */
class BankaccountManager
{
    /** @var ClientInterface */
    private $httpClient;

    /** @var string */
    private $apiKey;

    /** @var string */
    private $uri;

    /**
     * @param ClientInterface $httpClient
     * @param string          $apiKey
     * @param string          $uri
     */
    public function __construct(ClientInterface $httpClient, $apiKey, $uri)
    {
        $this->httpClient = $httpClient;
        $this->apiKey     = $apiKey;
        $this->uri        = $uri;
    }

}
