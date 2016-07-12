<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/11/16
 * Time: 7:50 PM
 */

namespace OK\ApiSdk\Di\Logger;


interface LoggerInterface
{
    const DEBUG = "DEBUG";

    const INFO = "INFO";

    const WARN = "WARN";

    const ERROR = "ERROR";

    const FATAL = "FATAL";

    const PANIC = "PANIC";

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