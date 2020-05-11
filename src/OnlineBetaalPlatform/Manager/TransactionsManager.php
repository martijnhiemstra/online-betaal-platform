<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace OnlineBetaalPlatform\Manager;

use GuzzleHttp\ClientInterface;

/**
 * Class MerchantsManager
 */
class TransactionsManager
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
