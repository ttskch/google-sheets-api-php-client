<?php

namespace Ttskch\GoogleSheetsApi;

class Authenticator
{
    /**
     * @var \Google_Client
     */
    private $googleClient;

    /**
     * @param \Google_Client $googleClient
     */
    public function __construct(\Google_Client $googleClient)
    {
        $this->googleClient = $googleClient;
    }

    /**
     * @param bool $forceApprovalPrompt set true to force the approval UI to appear.
     */
    public function authorize($forceApprovalPrompt = false)
    {
        $this->googleClient->setAccessType('offline');  // for getting refresh token in authentication
        $this->googleClient->setApprovalPrompt($forceApprovalPrompt ? 'force' : 'auto');
        $authUrl = $this->googleClient->createAuthUrl([
            \Google_Service_Sheets::SPREADSHEETS,
            \Google_Service_Oauth2::USERINFO_EMAIL,
            \Google_Service_Oauth2::USERINFO_PROFILE,
        ]);

        header(sprintf('Location: %s', filter_var($authUrl, FILTER_SANITIZE_URL)));
        exit;
    }

    /**
     * @param $code
     * @return array
     */
    public function authenticate($code)
    {
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($code);

        return $token;
    }

    /**
     * @param array $token
     */
    public function setAccessToken(array $token)
    {
        $this->googleClient->setAccessToken($token);
    }
}
