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
     */
    public function build($api, $version, $params = null)
    {
        
    }

    /**
     * @return string
     */
    protected function getDeviceId()
    {

    }

    /**
     * @return string
     */
    protected function getGatewayUrl()
    {

    }

    /**
     * @return string
     */
    protected function getParamJson()
    {

    }

    /**
     * @return string
     */
    protected function getPostBody()
    {

    }

    /**
     * @return string
     */
    protected function getSign()
    {

    }

    /**
     * @return string
     */
    protected function getTimestamp()
    {
        return (string)time();
    }
}