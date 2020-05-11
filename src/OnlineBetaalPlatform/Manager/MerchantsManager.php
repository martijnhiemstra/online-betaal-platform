<?php

namespace OnlineBetaalPlatform\Manager;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use OnlineBetaalPlatform\Model\Merchant;
use OnlineBetaalPlatform\Model\Merchant\SeamlessSignupResponse;
use OnlineBetaalPlatform\Model\Merchant\SignupResponse;

/**
 * Class MerchantsManager
 */
class MerchantsManager
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

    /**
     * @param string The return url
     * @param string The notify url
     * 
     * @return Merchant
     *
     * @throws \Exception
     */
    public function whitelabelOnboarding($returnUrl, $notifyUrl): SignupResponse
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
    public function seamlessOnboarding($country, $email, $coc_nr, $notify_url): SeamlessSignupResponse
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

            return json_decode($response->getBody()->getContents());
        } catch (\Exception $exception) {
            throw new \Exception('Unable to create merchant');
        }
    }
}
