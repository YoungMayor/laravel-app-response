<?php

namespace YoungMayor\AppResponse;

class AppResponse extends Auto
{
    public $api, $web;

    public function __construct()
    {
        $this->api = new API();
        $this->web = new Web();
    }
}
