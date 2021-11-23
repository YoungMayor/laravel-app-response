<?php

namespace YoungMayor\AppResponse;

use Illuminate\Support\Facades\Response;
use YoungMayor\AppResponse\Traits\ResponseBuilder;

class Auto
{
    use ResponseBuilder;

    /**
     * Built a response for a request
     *
     * @param string $message
     * @param string $status
     * @param int $statusCode
     * @param mixed $data
     * @param array $headers
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function buildResponse(
        string $message,
        string $status,
        int $statusCode,
        $data = null,
        array $headers = [],
        string $dataKey = 'data'
    ) {
        if (request()->expectsJson() || !config('app-response.render-web-as-view')) {
            return (new API())->buildResponse(
                $message,
                $status,
                $statusCode,
                $data,
                $headers,
                $dataKey
            );
        } else {
            return (new Web())->buildResponse(
                $message,
                $status,
                $statusCode,
                $data,
                $headers,
                $dataKey
            );
        }
    }
}
