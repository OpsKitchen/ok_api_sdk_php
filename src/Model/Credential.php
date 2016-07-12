<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:48 PM
 */

namespace OK\ApiSdk\Model;


class Credential
{
    /**
     * @var string
     */
    protected $appKey;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $sessionId;

    /**
     * @return string
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param string $appKey
     * @return Credential
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     * @return Credential
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return Credential
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
        return $this;
    }
}