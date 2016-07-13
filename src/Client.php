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
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
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
     *
     * @return ApiResult
     */
    public function callApi($api, $version, $params = null)
    {
        try {
            $request = $this->requestBuilder->build($api, $version, $params);
        } catch (InvalidArgumentException $e) {
            //invalid argument
            self::$defaultLogger->error("Invalid argument: ". $e->getMessage());
            return $this->errorMessage($e->getMessage());
        }
        try {
            $response = $this->httpClient->send($request);
        } catch (GuzzleException $e) {
            //failed connect
            self::$defaultLogger->error("Failed connect: " . $e->getMessage());
            return $this->errorMessage($e->getMessage());
        }

        if ($response->getStatusCode() !== 200) {
            //server side error
            self::$defaultLogger->error("Failed to do http communication: " . $response->getReasonPhrase());
            return $this->errorMessage($response->getReasonPhrase());
        }

        self::$defaultLogger->debug("Response body: " . $response->getBody());

        $jsonObj = json_decode($response->getBody());
        if (json_last_error()) {
            //response body is invalid json
            $message = "Reponse body is not valid json.";
            self::$defaultLogger->error($message);
            return $this->errorMessage($message);
        }
        return $jsonObj;
    }

    /**
     * @param string $message
     * @return ApiResult
     */
    private function errorMessage($message)
    {
        $returnData = new ApiResult();
        $returnData->setSuccess(false);
        $returnData->setErrorMessage($message);
        return $returnData;
    }
}