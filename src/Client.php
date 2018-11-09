<?php

namespace Ttskch\GoogleSheetsApi;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;

class Client
{
    /**
     * @var \Google_Service_Sheets
     */
    private $googleService;

    /**
     * @var \Google_Client
     */
    private $googleClient;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @param \Google_Service_Sheets $googleService
     * @param ClientInterface|null $httpClient
     */
    public function __construct(\Google_Service_Sheets $googleService, ClientInterface $httpClient = null)
    {
        $this->googleService = $googleService;
        $this->googleClient = $googleService->getClient();
        $this->httpClient = $httpClient ?: new HttpClient();
    }

    /**
     * @param array $token
     */
    public function setToken(array $token)
    {
        $this->googleClient->setAccessToken($token);
    }

    /**
     * @return array
     */
    public function refresh()
    {
        $token = $this->googleClient->fetchAccessTokenWithRefreshToken($this->googleClient->getRefreshToken());

        return $token;
    }

    /**
     * @return \Google_Service_Sheets
     */
    public function getGoogleService()
    {
        if ($this->googleClient->getAccessToken() && $this->googleClient->isAccessTokenExpired()) {
            $this->refresh();
        }

        return $this->googleService;
    }
}
