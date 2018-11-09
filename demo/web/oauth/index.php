<?php
require __DIR__ . '/../../../vendor/autoload.php';

$parameters = require __DIR__ . '/../../parameters.php';

session_start();

$googleClient = \Ttskch\GoogleSheetsApi\Factory\GoogleClientFactory::createOAuthClient(
    $parameters['client_id'],
    $parameters['client_secret'],
    $parameters['redirect_uri'],
    $parameters['javascript_origin']
);

$authenticator = new \Ttskch\GoogleSheetsApi\Authenticator($googleClient);

if (isset($_SESSION['token'])) {
    $googleClient->setAccessToken($_SESSION['token']);
} elseif (isset($_GET['code'])) {
    $_SESSION['token'] = $authenticator->authenticate($_GET['code']);
    header('Location: /oauth');
    exit;
} else {
    $authenticator->authorize();
}

$api = \Ttskch\GoogleSheetsApi\Factory\ApiClientFactory::create($googleClient);

/** @see https://docs.google.com/spreadsheets/d/1JQkfd3dlyxFRuxIwGPnBnrxS-l-bLVw_BbHskxT9Nj4/edit#gid=0 */
$spreadsheetId = '1JQkfd3dlyxFRuxIwGPnBnrxS-l-bLVw_BbHskxT9Nj4';
$range = 'demo!A1:C4';

$response = $api->getGoogleService()->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

var_dump($values);
