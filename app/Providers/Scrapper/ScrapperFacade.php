<?php

namespace App\Providers\Scrapper;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Cache;

class ScrapperFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'scrapper';
    }
}
