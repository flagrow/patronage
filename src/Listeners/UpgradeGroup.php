<?php

namespace Flagrow\Patronage\Listeners;

use Flarum\Core\AuthToken;
use Flarum\Event\UserWillBeSaved;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Arr;

class UpgradeGroup
{
    /**
     * @var SettingsRepositoryInterface
     */
    private $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function subscribe(Dispatcher $events)
    {
        $events->listen(UserWillBeSaved::class, [$this, 'upgrade']);
    }

    public function upgrade(UserWillBeSaved $event)
    {
        if ($token = Arr::get($event->data, 'attributes.token')) {
            $token = AuthToken::find($token);
        }
    }
}
