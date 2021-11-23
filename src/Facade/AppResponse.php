<?php

namespace YoungMayor\AppResponse\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \YoungMayor\AppResponse\Skeleton\SkeletonClass
 */
class AppResponse extends Facade
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
