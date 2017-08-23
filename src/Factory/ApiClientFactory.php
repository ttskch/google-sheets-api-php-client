<?php

namespace Ttskch\GoogleSheetsApi\Factory;

use Ttskch\GoogleSheetsApi\Client;

class ApiClientFactory
{
    /**
     * @param \Google_Client $authorizedGoogleClient
     * @return Client
     */
    static public function create(\Google_Client $authorizedGoogleClient)
    {
        $service = new \Google_Service_Sheets($authorizedGoogleClient);
        $client = new Client($service);

        return $client;
    }
}
