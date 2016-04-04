<?php namespace Roominga\Providers;

use Illuminate\Support\ServiceProvider;


class EventServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app['events']->listen('Roominga.*', 'Roominga\Handlers\EmailNotifier');
    }

}