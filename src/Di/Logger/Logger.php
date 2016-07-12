<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:51 PM
 */

namespace OK\ApiSdk\Di\Logger;

use OK\ApiSdk\Constant;
use Phalcon\Logger\Adapter\File as FileLogger;

class Logger implements LoggerInterface
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $line;

    /**
     * @var FileLogger
     */
    protected $fileLogger;

    /**
     * Logger constructor.
     * @param string $logPath
     */
    public function __construct($logPath = Constant::DEFAULT_LOG_PATH)
    {
        $caller = debug_backtrace()[0];
        $this->file = $caller[Constant::TRACE_FILE];
        $this->line = $caller[Constant::TRACE_LINE];
        $this->fileLogger = new FileLogger($logPath);
    }

    /**
     * @param string $content
     */
    public function debug($content)
    {
        $this->fileLogger->log("$content  [printed by $this->file line $this->line]", LoggerInterface::DEBUG);
    }

    /**
     * @param string $content
     */
    public function info($content)
    {
        $this->fileLogger->log("$content  [printed by $this->file line $this->line]", LoggerInterface::INFO);
    }

    /**
     * @param string $content
     */
    public function warn($content)
    {
        $this->fileLogger->log("$content  [printed by $this->file line $this->line]", LoggerInterface::WARN);
    }

    /**
     * @param string $content
     */
    public function error($content)
    {
        $this->fileLogger->log("$content  [printed by $this->file line $this->line]", LoggerInterface::ERROR);
    }

    /**
     * @param string $content
     */
    public function fatal($content)
    {
        $this->fileLogger->log("$content  [printed by $this->file line $this->line]", LoggerInterface::FATAL);
        exit;
    }

    /**
     * @param string $content
     */
    public function panic($content)
    {
        $this->fileLogger->log("$content  [printed by $this->file line $this->line]", LoggerInterface::PANIC);
        exit;
    }
}