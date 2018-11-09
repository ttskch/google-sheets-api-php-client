# google-sheets-api-php-client

[![Latest Stable Version](https://poser.pugx.org/ttskch/google-sheets-api-php-client/v/stable)](https://packagist.org/packages/ttskch/google-sheets-api-php-client)
[![Total Downloads](https://poser.pugx.org/ttskch/google-sheets-api-php-client/downloads)](https://packagist.org/packages/ttskch/google-sheets-api-php-client)

PHP client library for Google Sheets API.

## Requirements

- PHP 5.6+

## Installations

```bash
$ composer require ttskch/google-sheets-api-php-client:@dev
```

## Usage

### Initializing API client

#### With OAuth2

```php
// create \Google_Client instance with your OAuth2 client ID.
$googleClient = \Ttskch\GoogleSheetsApi\Factory\GoogleClientFactory::createOAuthClient(
    'client_id',
    'client_secret',
    'redirect_uri',
    'javascript_origin'
);

// authenticate and be athorized.
$authenticator = new \Ttskch\GoogleSheetsApi\Authenticator($googleClient);
if (isset($_GET['code'])) {
    $authenticator->authenticate($_GET['code']);
} else {
    $authenticator->authorize();
}
```

#### With Service Account

```php
// create \Google_Client instance with your Service Account credentials json file.
$googleClient = \Ttskch\GoogleSheetsApi\Factory\GoogleClientFactory::createServiceAccountClient('/path/to/service-account-credentials.json');
```

### Using API

```php
// create API client with authorized \Google_Client.
$api = \Ttskch\GoogleSheetsApi\Factory\ApiClientFactory::create($googleClient);

$service = $api->getGoogleService();

// now you can call all apis via $service.
// see \Google_Service_Sheets class to learn more about details.
$service->spreadsheets->...;
$service->spreadsheets_sheets->...;
$service->spreadsheets_values->...;
```

See also [demo](demo).
