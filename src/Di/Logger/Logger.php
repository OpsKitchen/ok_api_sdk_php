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
     * @var int
     */
    protected $level;

    /**
     * @var string
     */
    protected $logPath;

    /**
     * Logger constructor.
     * @param int $level
     * @param string $logPath
     */
    public function __construct($level = LoggerInterface::DEBUG, $logPath = Constant::DEFAULT_LOG_PATH)
    {
        $this->level = $level;
        $this->logPath = $logPath;
    }

    /**
     * @param string $content
     */
    public function debug($content)
    {
        if ($this->level >= LoggerInterface::DEBUG) {
            $this->writeLog($content, LoggerInterface::DEBUG);
        }
    }

    /**
     * @param string $content
     */
    public function info($content)
    {
        if ($this->level >= LoggerInterface::INFO) {
            $this->writeLog($content, "INFO");
        }
    }

    /**
     * @param string $content
     */
    public function warn($content)
    {
        if ($this->level >= LoggerInterface::WARN) {
            $this->writeLog($content, "WARN");
        }
    }

    /**
     * @param string $content
     */
    public function error($content)
    {
        if ($this->level >= LoggerInterface::ERROR) {
            $this->writeLog($content, "ERROR");
        }
    }

    /**
     * @param string $content
     */
    public function fatal($content)
    {
        if ($this->level >= LoggerInterface::FATAL) {
            $this->writeLog($content, "FATAL");
            exit;
        }
    }

    /**
     * @param string $content
     */
    public function panic($content)
    {
        if ($this->level >= LoggerInterface::PANIC) {
            $this->writeLog($content, "PANIC");
        }
    }

    /**
     * @param string $content
     * @param string $levelName
     * @return bool
     */
    final protected function writeLog($content, $levelName)
    {
        if (!$fp = fopen($this->logPath, 'a')) {
            return false;
        }
        $message = "[".$levelName."]: ".$content."\n";
        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);

        return true;
    }
}