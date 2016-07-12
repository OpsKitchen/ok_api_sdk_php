<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:51 PM
 */

namespace OK\ApiSdk\Di\Logger;

use OK\ApiSdk\Constant;

class Logger implements LoggerInterface
{
    /**
     * @var string
     */
    protected $logPath;

    /**
     * Logger constructor.
     * @param string $logPath
     */
    public function __construct($logPath = Constant::DEFAULT_LOG_PATH)
    {
        $this->logPath = $logPath;
    }

    /**
     * @param string $content
     */
    public function debug($content)
    {
        $this->writeLog($content, LoggerInterface::DEBUG);
    }

    /**
     * @param string $content
     */
    public function info($content)
    {
        $this->writeLog($content, LoggerInterface::INFO);
    }

    /**
     * @param string $content
     */
    public function warn($content)
    {
        $this->writeLog($content, LoggerInterface::WARN);
    }

    /**
     * @param string $content
     */
    public function error($content)
    {
        $this->writeLog($content, LoggerInterface::ERROR);
    }

    /**
     * @param string $content
     */
    public function fatal($content)
    {
        $this->writeLog($content, LoggerInterface::FATAL);
        exit;
    }

    /**
     * @param string $content
     */
    public function panic($content)
    {
        $this->writeLog($content, LoggerInterface::PANIC);
    }

    /**
     * @param string $content
     * @param string $level
     * @return bool
     */
    final protected function writeLog($content, $level = LoggerInterface::DEBUG)
    {
        if (!$fp = fopen($this->logPath, 'a')) {
            return false;
        }
        $message = "[".$level."]: ".$content;
        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);

        return true;
    }
}