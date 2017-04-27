<?php

namespace Flagrow\Patronage\Api\Controllers;

use Flarum\Forum\Controller\AbstractOAuth2Controller;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class AuthController extends AbstractOAuth2Controller
{

    /**
     * @param string $redirectUri
     * @return \League\OAuth2\Client\Provider\AbstractProvider
     */
    protected function getProvider($redirectUri)
    {
        // TODO: Implement getProvider() method.
    }

    /**
     * @return array
     */
    protected function getAuthorizationUrlOptions()
    {
        // TODO: Implement getAuthorizationUrlOptions() method.
    }

    /**
     * @param ResourceOwnerInterface $resourceOwner
     * @return array
     */
    protected function getIdentification(ResourceOwnerInterface $resourceOwner)
    {
        // TODO: Implement getIdentification() method.
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
