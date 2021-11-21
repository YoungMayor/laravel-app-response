<?php

namespace YoungMayor\AppResponse;

use Illuminate\Support\Facades\Facade;

/**
 * @see \YoungMayor\AppResponse\Skeleton\SkeletonClass
 */
class AppResponseFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'app-response';
    }
}
