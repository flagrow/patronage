<?php

namespace Flagrow\Patronage\Api\Controllers;

use Flarum\Forum\AuthenticationResponseFactory;
use Flarum\Forum\Controller\AbstractOAuth2Controller;
use Flarum\Settings\SettingsRepositoryInterface;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use Gravure\Patreon\Oauth\Provider\PatreonProvider as Patreon;

class PatreonAuthController extends AbstractOAuth2Controller
{
    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    public function __construct(AuthenticationResponseFactory $authResponse, SettingsRepositoryInterface $settings)
    {
        $this->authResponse = $authResponse;
        $this->settings = $settings;
    }

    /**
     * @param string $redirectUri
     * @return \League\OAuth2\Client\Provider\AbstractProvider
     */
    protected function getProvider($redirectUri)
    {
        return new Patreon([
            'clientId'     => $this->settings->get('flagrow-patronage.client_id'),
            'clientSecret' => $this->settings->get('flagrow-patronage.client_secret'),
            'redirectUri'  => $redirectUri
        ]);
    }

    /**
     * @return array
     */
    protected function getAuthorizationUrlOptions()
    {
        return [];
    }

    /**
     * @param ResourceOwnerInterface $resourceOwner
     * @return array
     */
    protected function getIdentification(ResourceOwnerInterface $resourceOwner)
    {
        return [
            'email' => $resourceOwner->getEmail()
        ];
    }

    /**
     * @param ResourceOwnerInterface $resourceOwner
     * @return array
     */
    protected function getSuggestions(ResourceOwnerInterface $resourceOwner)
    {
        // TODO: Implement getSuggestions() method.
    }
}
