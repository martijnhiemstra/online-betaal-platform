<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use OnlineBetaalPlatform\Exception\MerchantException;
use OnlineBetaalPlatform\Model\Merchant;
use OnlineBetaalPlatform\Model\Merchant\SeamlessSignupRequest;
use OnlineBetaalPlatform\Model\Merchant\SeamlessSignupResponse;
use OnlineBetaalPlatform\Model\Merchant\WhitelabelSignupRequest;
use OnlineBetaalPlatform\Model\Merchant\WhitelabelSignupResponse;
use OnlineBetaalPlatform\Utils\RequestUtils;
use phpDocumentor\Reflection\Types\Integer;

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
        $this->apiKey     = $apiKey;
        $this->baseApiUrl = $baseApiUrl;
    }

    /**
     * @param WhitelabelSignupRequest The whitelabel signup request
     * 
     * @return Merchant
     *
     * @throws \Exception
     */
    public function whitelabelOnboarding(WhitelabelSignupRequest $whitelabelSignupRequest)
    {
        try {
            $uri = RequestUtils::createUrl($this->baseApiUrl, '/signups');

            return RequestUtils::doCall($uri, 'POST', $this->apiKey, $whitelabelSignupRequest, new WhitelabelSignupResponse());
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
    public function seamlessOnboarding(SeamlessSignupRequest $seamlessSignupRequest)
    {
        try {
            $uri = RequestUtils::createUrl($this->baseApiUrl, '/merchants');

            return RequestUtils::doCall($uri, 'POST', $this->apiKey, $seamlessSignupRequest, new SeamlessSignupResponse());
        } catch (Exception $exception) {
            throw new MerchantException('Unable to perform seasmless onboarding: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param The merchant uid
     * 
     * @return The found merchant
     * 
     * @throws \MerchantException When any kind of error occured
     */
    public function getMerchant(String $merchantUid) {
        try {
            $uri = RequestUtils::createUrl($this->baseApiUrl, '/merchants/' . $merchantUid);

            return RequestUtils::doCall($uri, 'GET', $this->apiKey, '', new SeamlessSignupResponse());
        } catch (Exception $exception) {
            throw new MerchantException('Unable to get merchant information: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
