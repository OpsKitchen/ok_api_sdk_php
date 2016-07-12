<?php
/**
 * Created by PhpStorm.
 * User: qin
 * Date: 7/12/16
 * Time: 11:17 AM
 */

use OK\ApiSdk\Client;
use OK\ApiSdk\Constant;
use OK\ApiSdk\Di\Logger\Logger;

include __DIR__ . "/init.php";

function main()
{
    $client = new Client();
    $client->requestBuilder->config->setAppVersionValue("1.0")->setAppMarketIdValue("678")
        ->setGatewayHost("api.OpsKitchen.com")->setDisableSSL(true);
    $client->requestBuilder->credential->setAppKey("101")->setSecret("7INWkF/qSkkXrFwZ");
    $client::setDefaultLogger(new Logger(Constant::DEFAULT_LOG_PATH));

    try {
        $response = $client->callApi("ops.meta.os.list", "1.0");
        print_r($response);
    } catch (\Exception $e) {
        print_r($e);
    }
}

main();
