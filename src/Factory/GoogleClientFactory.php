<?php

namespace Ttskch\GoogleSheetsApi\Factory;

use Ttskch\GoogleSheetsApi\Exception\RuntimeException;

class GoogleClientFactory
{
    /**
     * @param $clientId
     * @param $clientSecret
     * @param $redirectUri
     * @param $javascriptOrigin
     * @return \Google_Client
     */
    static public function createOAuthClient($clientId, $clientSecret, $redirectUri, $javascriptOrigin)
    {
        $client = new \Google_Client();
        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->setHostedDomain($javascriptOrigin);

        return $client;
    }

    /**
     * @param $credentialsFilePath
     * @return \Google_Client
     */
    static public function createServiceAccountClient($credentialsFilePath)
    {
        if (!file_exists($credentialsFilePath)) {
            throw new RuntimeException('Invalid credentials file path');
        }

        $client = new \Google_Client();
        $client->setAuthConfig($credentialsFilePath);
        $client->setScopes([
            \Google_Service_Sheets::SPREADSHEETS,
            \Google_Service_Oauth2::USERINFO_EMAIL,
            \Google_Service_Oauth2::USERINFO_PROFILE,
        ]);

        return $client;
    }
}
