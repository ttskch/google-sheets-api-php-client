<?php

namespace Ttskch\GoogleSheetsApi\Factory;

class GoogleClientFactory
{
    /**
     * @param $clientId
     * @param $clientSecret
     * @param $redirectUri
     * @param $javascriptOrigin
     * @return \Google_Client
     */
    static public function create($clientId, $clientSecret, $redirectUri, $javascriptOrigin)
    {
        $client = new \Google_Client();
        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->setHostedDomain($javascriptOrigin);

        return $client;
    }
}
