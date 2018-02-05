<?php

namespace Flagrow\Patronage\Api\Controllers;

use Flarum\Forum\AuthenticationResponseFactory;
use Flarum\Forum\Controller\AbstractOAuth2Controller;
use Flarum\Settings\SettingsRepositoryInterface;
use Gravure\Patreon\Oauth\Resources\Patron;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use Gravure\Patreon\Oauth\Provider\Patreon;

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
        return ['scope' => ['users', 'pledges-to-me']];
    }

    /**
     * @param ResourceOwnerInterface|Patron $resourceOwner
     * @return array
     */
    protected function getIdentification(ResourceOwnerInterface $resourceOwner)
    {
        return [
            'email' => $resourceOwner->email
        ];
    }

    /**
     * @param ResourceOwnerInterface|Patron $resourceOwner
     * @return array
     */
    protected function getSuggestions(ResourceOwnerInterface $resourceOwner)
    {
        return [
            'username' => $resourceOwner->getUsername(),
            'avatarUrl' => $resourceOwner->getAvatar()
        ];
    }
}
