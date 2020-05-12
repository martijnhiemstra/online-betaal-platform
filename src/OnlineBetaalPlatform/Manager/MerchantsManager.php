<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use GuzzleHttp\Client;
use OnlineBetaalPlatform\Exception\MerchantException;
use OnlineBetaalPlatform\Model\Merchant;
use OnlineBetaalPlatform\Model\Merchant\SeamlessSignupResponse;
use OnlineBetaalPlatform\Model\Merchant\WhitelabelSignupResponse;

/**
 * Contains methodes to create. modify and get merchants in the OBP system.
 */
class MerchantsManager
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
     * @param string The return url
     * @param string The notify url
     * 
     * @return Merchant
     *
     * @throws \Exception
     */
    public function whitelabelOnboarding($returnUrl, $notifyUrl): WhitelabelSignupResponse
    {
        try {
            $uri = $this->baseApiUrl . '/signups';

            $response = $this->httpClient->request('POST', $uri, [
                'auth' => [$this->apiKey, null], 'form_params' => [
                    'type'          => 'business',
                    'return_url'    => $returnUrl,
                    'notify_url'    => $notifyUrl,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Invalid response');
            }

            return json_decode($response->getBody()->getContents());
        } catch (Exception $exception) {
            throw new MerchantException('Unable to perform whitelabel onboarding: ' . $exception->getMessage(), $exception->getCode(), $exception);
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
            $uri = $this->baseApiUrl . '/merchants';

            $response = $this->httpClient->request('POST', $uri, [
                'auth' => [$this->apiKey, null], 'form_params' => [
                    'type'          => 'business',
                    'coc_nr'        => $coc_nr,
                    'country'       => $country,
                    'emailaddress'  => $email,
                    'notify_url'    => $notify_url,
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Invalid response');
            }

            return json_decode($response->getBody()->getContents());
        } catch (Exception $exception) {
            throw new MerchantException('Unable to perform whitelabel onboarding: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
