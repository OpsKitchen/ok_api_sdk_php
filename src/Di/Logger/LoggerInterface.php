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
    const DEBUG = 7;

    const INFO = 6;

    const WARN = 4;

    const ERROR = 3;

    const FATAL = 1;

    const PANIC = 0;

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