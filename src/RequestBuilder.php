<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:45 PM
 */

namespace OK\ApiSdk;


use GuzzleHttp\Psr7\Request;
use OK\ApiSdk\Model\Config;
use OK\ApiSdk\Model\Credential;

class RequestBuilder
{
    /**
     * @var Config
     */
    public $config;

    /**
     * @var Credential
     */
    public $credential;

    /**
     * RequestBuilder constructor.
     */
    public function __construct()
    {
        $this->config = new Config();
        $this->credential = new Credential();
    }

    /**
     * @param string $api
     * @param string $version
     * @param mixed $params
     *
     * @return Request
     * @throws \InvalidArgumentException
     */
    public function build($api, $version, $params = null)
    {
        $paramsJson = $this->getParamJson($params);
        $timestamp = $this->getTimestamp();
        $header = [
            "Content-Type" => "application/x-www-form-urlencoded",
            $this->config->getAppKeyFieldName() => $this->credential->getAppKey(),
            $this->config->getAppMarketIdFieldName() => $this->config->getAppMarketIdValue(),
            $this->config->getAppVersionFieldName() => $this->config->getAppVersionValue(),
            $this->config->getDeviceIdFieldName() => $this->getDeviceId(),
            $this->config->getSessionIdFieldName() => $this->credential->getSessionId(),
            $this->config->getSignFieldName() => $this->getSign($api, $version, $paramsJson, $timestamp)

        ];
        return new Request(Constant::DEFAULT_HTTP_METHOD, $this->getGatewayUrl(), $header,
            $this->getPostBody($api, $version, $paramsJson, $timestamp));
    }

    /**
     * Get mac address of physical net interface
     * @todo windows support
     * @return string
     */
    protected function getDeviceId()
    {
        return exec("/sbin/ip addr|/bin/grep link/ether | /bin/awk '{print $2}'");
    }

    /**
     * @return string
     */
    protected function getGatewayUrl()
    {
        $scheme = $this->config->isDisableSSL() ? "http" : "https";
        return "$scheme://" . $this->config->getGatewayHost() . $this->config->getGatewayPath();
    }

    /**
     * @param mixed $obj
     * @return string
     */
    protected function getParamJson($obj)
    {
        return json_encode($obj);
    }

    /**
     * @param string $api
     * @param string $version
     * @param string $paramsJson
     * @param string $timestamp
     * @return string
     */
    protected function getPostBody($api, $version, $paramsJson, $timestamp)
    {
        return $this->config->getApiFieldName() . "=" . $api
            . "&" . $this->config->getVersionFieldName() . "=" . $version
            . "&" . $this->config->getParamsFieldName() . "=" . $paramsJson
            . "&" . $this->config->getTimestampFieldName() . "=" . $timestamp;
    }

    /**
     * @param string $api
     * @param string $version
     * @param string $paramsJson
     * @param string $timestamp
     * @return string
     */
    protected function getSign($api, $version, $paramsJson, $timestamp)
    {
        return md5($this->credential->getSecret() . $api . $version . $paramsJson . $timestamp);
    }

    /**
     * @return string
     */
    protected function getTimestamp()
    {
        return (string)time();
    }
}