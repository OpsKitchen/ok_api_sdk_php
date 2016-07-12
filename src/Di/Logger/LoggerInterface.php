<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:50 PM
 */

namespace OK\ApiSdk\Di\Logger;

use Phalcon\Logger;

interface LoggerInterface
{
    const DEBUG = Logger::DEBUG;

    const INFO = Logger::INFO;

    const WARN = Logger::WARNING;

    const ERROR = Logger::ERROR;

    const FATAL = Logger::CRITICAL;

    const PANIC = Logger::EMERGENCY;

    /**
     * @param string $content
     */
    public function debug($content);

    /**
     * @param string $content
     */
    public function info($content);

    /**
     * @param string $content
     */
    public function warn($content);

    /**
     * @param string $content
     */
    public function error($content);

    /**
     * @param string $content
     */
    public function fatal($content);

    /**
     * @param $content
     */
    public function panic($content);
}