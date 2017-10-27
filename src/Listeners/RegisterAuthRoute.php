<?php

namespace Flagrow\Patronage\Listeners;

use Flagrow\Patronage\Api\Controllers\PatreonAuthController;
use Flarum\Event\ConfigureForumRoutes;
use Illuminate\Contracts\Events\Dispatcher;

class RegisterAuthRoute
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureForumRoutes::class, [$this, 'add']);
    }

    public function add(ConfigureForumRoutes $event)
    {
        $event->get('/auth/patronage', 'auth.patronage', PatreonAuthController::class);
    }
}
