<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace OnlineBetaalPlatform\Manager;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Class MerchantsManager
 */
class TransactionsManager
{
    /** @var string */
    private $apiKey;

    /**
     * @param ClientInterface $httpClient
     * @param string          $apiKey
     */
    public function __construct($apiKey)
    {
        $this->httpClient = new Client();
        $this->apiKey     = $apiKey;
    }

}
