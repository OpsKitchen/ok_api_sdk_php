<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 16/7/12
 * Time: 下午9:51
 */

include __DIR__ . "/../../vendor/guzzlehttp/guzzle/src/functions_include.php";
include __DIR__ . "/../../vendor/guzzlehttp/promises/src/functions_include.php";
include __DIR__ . "/../../vendor/guzzlehttp/psr7/src/functions_include.php";
include __DIR__ . "/Autoloader.php";

$nameSpaces = [
    "Psr\\Http\\Message"                    => __DIR__ . "/../../vendor/psr/http-message/src",
    "GuzzleHttp\\Psr7"                      => __DIR__ . "/../../vendor/guzzlehttp/psr7/src",
    "GuzzleHttp\\Promise"                   => __DIR__ . "/../../vendor/guzzlehttp/promises/src",
    "GuzzleHttp"                            => __DIR__ . "/../../vendor/guzzlehttp/guzzle/src",
    "OK\\ApiSdk"                            => __DIR__ . "/../src"
];

$autoloader = new Autoloader();
foreach ($nameSpaces as $prefix => $baseDir) {
    $autoloader->addNamespace($prefix, $baseDir);
}

$autoloader->register();