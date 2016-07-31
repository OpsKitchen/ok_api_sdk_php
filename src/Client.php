<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:45 PM
 */

namespace OK\ApiSdk;


use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use OK\ApiSdk\Di\Logger\Logger;
use OK\ApiSdk\Model\ApiResult;

class Client
{
    /**
     * @var Logger
     */
    static public $defaultLogger;

    /**
     * @var ClientInterface
     */
    public $httpClient;

    /**
     * @var RequestBuilder
     */
    public $requestBuilder;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->requestBuilder = new RequestBuilder();
    }

    /**
     * @param Logger $logger
     */
    static public function setDefaultLogger($logger)
    {
        self::$defaultLogger = $logger;
    }

    /**
     * @param ClientInterface $httpClient
     */
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param $api
     * @param $version
     * @param mixed $params
     * @return ApiResult
     *
     * @throws \Exception
     */
    public function callApi($api, $version, $params = null)
    {
        $request = $this->requestBuilder->build($api, $version, $params);
        $response = $this->httpClient->send($request);
        self::$defaultLogger->debug("Response body: " . $response->getBody());

        if ($response->getStatusCode() !== 200) {
            //server side error
            $message = "Failed to do http communication: " . $response->getReasonPhrase();
            self::$defaultLogger->error($message);
            throw new \RuntimeException($message);
        }

        $jsonObj = json_decode($response->getBody());
        if (json_last_error()) {
            //response body is invalid json
            $message = "Response body is not valid json.";
            self::$defaultLogger->error($message);
            throw new \UnexpectedValueException($message);
        }

        $apiResult = new ApiResult();
        if (!isset($jsonObj->success)) {
            $message = "Response body does not contain field: success.";
            self::$defaultLogger->error($message);
            throw new \UnexpectedValueException($message);
        } else if ($jsonObj->success === false) {
            if (!isset($jsonObj->errorCode)) {
                $message = "Response body does not contain field: errorCode.";
                self::$defaultLogger->error($message);
                throw new \UnexpectedValueException($message);
            }
            $apiResult->setErrorCode($jsonObj->errorCode);
            if (isset($jsonObj->errorMessage)) {
                $apiResult->setErrorMessage($jsonObj->errorMessage);
            }
        }
        $apiResult->setSuccess($jsonObj->success);
        if (isset($jsonObj->data)) {
            $apiResult->setData($jsonObj->data);
        }

        return $apiResult;
    }
}