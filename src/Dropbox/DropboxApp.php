<?php
namespace Kunnu\Dropbox;

class DropboxApp
{

    /**
     * The Client ID of the App
     *
     * @link https://www.dropbox.com/developers/apps
     *
     * @var string
     */
    protected $clientId;

    /**
     * The Client Secret of the App
     *
     * @link https://www.dropbox.com/developers/apps
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * The Access Token
     *
     * @var string
     */
    protected $accessToken;

    /**
     * The Team User ID
     *
     * @var string
     */
    protected $teamUserId;

    /**
     * The Namespace ID
     *
     * @var string
     */
    protected $namespaceId;

    /**
     * Create a new Dropbox instance
     *
     * @param string $clientId     Application Client ID
     * @param string $clientSecret Application Client Secret
     * @param string $accessToken  Access Token
     */
    public function __construct($clientId, $clientSecret, $accessToken = null, $teamUserId = null, $namespaceId = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->teamUserId = $teamUserId;
        $this->namespaceId = $namespaceId;

    }

    /**
     * Get the App Client ID
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Get the App Client Secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Get the Access Token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Get the Team User ID
     *
     * @return string|null
     */
    public function getTeamUserId()
    {
        return $this->teamUserId;
    }

    /**
     * Get the Namespace ID
     *
     * @return string|null
     */
    public function getNamespaceId()
    {
        return $this->namespaceId;
    }
}
