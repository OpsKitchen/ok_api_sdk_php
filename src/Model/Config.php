<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:48 PM
 */

namespace OK\ApiSdk\Model;


use OK\ApiSdk\Constant;

class Config
{
    //platform address
    /**
     * @var bool
     */
    protected $disableSSL;

    /**
     * @var string
     */
    protected $gatewayHost;

    /**
     * @var string
     */
    protected $gatewayPath;

    /**
     * @var string
     */
    protected $httpMethod = Constant::DEFAULT_HTTP_METHOD;

    //System parameter name in HTTP header
    /**
     * @var string
     */
    protected $appKeyFieldName = Constant::APP_KEY_FIELD_NAME;

    /**
     * @var string
     */
    protected $appVersionFieldName = Constant::APP_VERSION_FIELD_NAME;

    /**
     * @var string
     */
    protected $appMarketIdFieldName = Constant::APP_MARKET_ID_FIELD_NAME;

    /**
     * @var string
     */
    protected $deviceIdFieldName = Constant::DEVICE_ID_FIELD_NAME;

    /**
     * @var string
     */
    protected $sessionIdFieldName = Constant::SESSION_ID_FIELD_NAME;

    /**
     * @var string
     */
    protected $signFieldName = Constant::SIGN_FIELD_NAME;

    //System parameter name in HTTP body
    /**
     * @var string
     */
    protected $apiFieldName = Constant::API_FIELD_NAME;

    /**
     * @var string
     */
    protected $paramsFieldName = Constant::PARAMS_FIELD_NAME;

    /**
     * @var string
     */
    protected $timestampFieldName = Constant::TIMESTAMP_FIELD_NAME;

    /**
     * @var string
     */
    protected $versionFieldName = Constant::VERSION_FIELD_NAME;

    //System parameter value
    /**
     * @var string
     */
    protected $appVersionValue;

    /**
     * @var string
     */
    protected $appMarketIdValue;

    /**
     * @return boolean
     */
    public function isDisableSSL()
    {
        return $this->disableSSL;
    }

    /**
     * @param boolean $disableSSL
     * @return Config
     */
    public function setDisableSSL($disableSSL)
    {
        $this->disableSSL = $disableSSL;
        return $this;
    }

    /**
     * @return string
     */
    public function getGatewayHost()
    {
        return $this->gatewayHost;
    }

    /**
     * @param string $gatewayHost
     * @return Config
     */
    public function setGatewayHost($gatewayHost)
    {
        $this->gatewayHost = $gatewayHost;
        return $this;
    }

    /**
     * @return string
     */
    public function getGatewayPath()
    {
        return $this->gatewayPath;
    }

    /**
     * @param string $gatewayPath
     * @return Config
     */
    public function setGatewayPath($gatewayPath)
    {
        $this->gatewayPath = $gatewayPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * @param string $httpMethod
     * @return Config
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppKeyFieldName()
    {
        return $this->appKeyFieldName;
    }

    /**
     * @param string $appKeyFieldName
     * @return Config
     */
    public function setAppKeyFieldName($appKeyFieldName)
    {
        $this->appKeyFieldName = $appKeyFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppVersionFieldName()
    {
        return $this->appVersionFieldName;
    }

    /**
     * @param string $appVersionFieldName
     * @return Config
     */
    public function setAppVersionFieldName($appVersionFieldName)
    {
        $this->appVersionFieldName = $appVersionFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppMarketIdFieldName()
    {
        return $this->appMarketIdFieldName;
    }

    /**
     * @param string $appMarketIdFieldName
     * @return Config
     */
    public function setAppMarketIdFieldName($appMarketIdFieldName)
    {
        $this->appMarketIdFieldName = $appMarketIdFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceIdFieldName()
    {
        return $this->deviceIdFieldName;
    }

    /**
     * @param string $deviceIdFieldName
     * @return Config
     */
    public function setDeviceIdFieldName($deviceIdFieldName)
    {
        $this->deviceIdFieldName = $deviceIdFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionIdFieldName()
    {
        return $this->sessionIdFieldName;
    }

    /**
     * @param string $sessionIdFieldName
     * @return Config
     */
    public function setSessionIdFieldName($sessionIdFieldName)
    {
        $this->sessionIdFieldName = $sessionIdFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignFieldName()
    {
        return $this->signFieldName;
    }

    /**
     * @param string $signFieldName
     * @return Config
     */
    public function setSignFieldName($signFieldName)
    {
        $this->signFieldName = $signFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiFieldName()
    {
        return $this->apiFieldName;
    }

    /**
     * @param string $apiFieldName
     * @return Config
     */
    public function setApiFieldName($apiFieldName)
    {
        $this->apiFieldName = $apiFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getParamsFieldName()
    {
        return $this->paramsFieldName;
    }

    /**
     * @param string $paramsFieldName
     * @return Config
     */
    public function setParamsFieldName($paramsFieldName)
    {
        $this->paramsFieldName = $paramsFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimestampFieldName()
    {
        return $this->timestampFieldName;
    }

    /**
     * @param string $timestampFieldName
     * @return Config
     */
    public function setTimestampFieldName($timestampFieldName)
    {
        $this->timestampFieldName = $timestampFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersionFieldName()
    {
        return $this->versionFieldName;
    }

    /**
     * @param string $versionFieldName
     * @return Config
     */
    public function setVersionFieldName($versionFieldName)
    {
        $this->versionFieldName = $versionFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppVersionValue()
    {
        return $this->appVersionValue;
    }

    /**
     * @param string $appVersionValue
     * @return Config
     */
    public function setAppVersionValue($appVersionValue)
    {
        $this->appVersionValue = $appVersionValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppMarketIdValue()
    {
        return $this->appMarketIdValue;
    }

    /**
     * @param string $appMarketIdValue
     * @return Config
     */
    public function setAppMarketIdValue($appMarketIdValue)
    {
        $this->appMarketIdValue = $appMarketIdValue;
        return $this;
    }
}