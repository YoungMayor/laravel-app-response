<?php

if (!function_exists("appResponse")) {
    function appResponse()
    {
        return app()->make('app-response');
    }
}
