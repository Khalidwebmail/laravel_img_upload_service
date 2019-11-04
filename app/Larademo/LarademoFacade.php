<?php

namespace App\Larademo;

use Illuminate\Support\Facades\Facade;

class LarademoFacade extends Facade
{
    protected function getFacadeAccessor()
    {
        return 'Larademo';
    }
}
