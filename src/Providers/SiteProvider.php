<?php

namespace App\Providers;

use Intersect\Providers\AppServiceProvider;

class SiteProvider extends AppServiceProvider {

    public function init()
    {
        // initialize app-level components like services, exception handlers, routes, etc..
    }

    public function initCommands()
    {
        // initialize commands that can be run during the intersect CLI requests
    }

}