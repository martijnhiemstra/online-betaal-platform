<?php

namespace OnlineBetaalPlatform\Utils;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

final class RequestUtils
{

    /**
     * @param String The url to call
     * @param String The request method to user. For example GET, POST, PUT etc
     * @param String The api key to use for authentication
     * @param Object The object to send in the body. May be null.
     * @param Object The object to map the json response into. The json mapper needs an existing object to load the json data into.
     * 
     * @return Object The return type is the same as the objectToMapTo argument
     *
     * @throws Exception If anything went wrong. RequestExceptions are converted into Exception and the response content is then available through exception.getMessage() 
     */
    public static function doCall(String $uri, String $uriMethod, $apiKey, $requestObject, $objectToMapTo)
    {
        try {
            $response = $this->httpClient->request($uriMethod, $uri, [
                'auth' => [$apiKey, null],
                'json' => $requestObject
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new Exception('Received an unexpected request status: ' . $response->getStatusCode());
            }

            $data = json_decode($response->getBody()->getContents());

            $mapper = new Client();
            return $mapper->map($data, $objectToMapTo);
        } catch (RequestException $exception) {
            throw new Exception('Unable to get bankaccounts: ' . $exception->getResponse()->getBody()->getContents(), $exception->getCode(), $exception);
        }
    }

}
