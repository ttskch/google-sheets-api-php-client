<?php
require __DIR__ . '/../../../vendor/autoload.php';

$googleClient = \Ttskch\GoogleSheetsApi\Factory\GoogleClientFactory::createServiceAccountClient(__DIR__ . '/../../service-account-credentials.json');

$api = \Ttskch\GoogleSheetsApi\Factory\ApiClientFactory::create($googleClient);

/** @see https://docs.google.com/spreadsheets/d/1JQkfd3dlyxFRuxIwGPnBnrxS-l-bLVw_BbHskxT9Nj4/edit#gid=0 */
$spreadsheetId = '1JQkfd3dlyxFRuxIwGPnBnrxS-l-bLVw_BbHskxT9Nj4';
$range = 'demo!A1:C4';

$response = $api->getGoogleService()->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

var_dump($values);
