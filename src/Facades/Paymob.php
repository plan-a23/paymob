<?php

namespace PlanA23\Paymob\Facades;

use Illuminate\Support\Facades\Facade;

class Paymob extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'paymob';
    }
}
