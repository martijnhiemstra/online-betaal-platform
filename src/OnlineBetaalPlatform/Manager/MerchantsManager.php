<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace OnlineBetaalPlatform\Manager;

use GuzzleHttp\ClientInterface;
use OnlineBetaalPlatform\Model\Merchant;

/**
 * Class MerchantsManager
 */
class MerchantsManager
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

    /**
     * @param string The return url
     * @param string The notify url
     * 
     * @return Merchant
     *
     * @throws \Exception
     */
    public function whitelabelOnboarding($returnUrl, $notifyUrl)
    {
        try {
            $response = $this->httpClient->request('POST', 'https://api-sandbox.onlinebetaalplatform.nl/v1/signups', [
                'auth' => [$this->apiKey, null], 'form_params' => [
                    'type'          => 'business',
                    'return_url'    => $returnUrl,
                    'notify_url'    => $notifyUrl,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Invalid response');
            }

            $signupResponse = json_decode($response->getBody()->getContents());

            return $signupResponse;
        } catch (\Exception $exception) {
            throw new \Exception('Unable to perform whitelabel onboarding');
        }
    }

    /**
     * @param string The merchants company
     * @param string The merchants email
     * @param string The chamber of commerce number
     * @param string The url to be notified of a change
     *
     * @return Merchant
     *
     * @throws \Exception
     */
    public function seamlessOnboarding($country, $email, $coc_nr, $notify_url)
    {
        try {
            $response = $this->httpClient->request('POST', 'https://api-sandbox.onlinebetaalplatform.nl/v1/merchants', [
                'auth' => [$this->apiKey, null], 'form_params' => [
                    'type'          => 'business',
                    'coc_nr'        => $coc_nr,
                    'country'       => $country,
                    'emailaddress'  => $email,
                    'notify_url'    => $notify_url,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Invalid response');
            }

            $signupResponse = json_decode($response->getBody()->getContents());

            return $signupResponse;
        } catch (\Exception $exception) {
            throw new \Exception('Unable to create merchant');
        }
    }
}
