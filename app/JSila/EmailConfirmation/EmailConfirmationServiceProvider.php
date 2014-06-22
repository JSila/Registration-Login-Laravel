<?php

namespace JSila\EmailConfirmation;

use Illuminate\Support\ServiceProvider;

class EmailConfirmationServiceProvider extends ServiceProvider {

    public $defer = false;

    public function register()
    {
        $this->app->events->listen('user.created', 'JSila\EmailConfirmation\UserEventHandler@onCreate');
    }
}
