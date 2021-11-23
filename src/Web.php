<?php

namespace YoungMayor\AppResponse;

use Illuminate\Support\Facades\Response;
use YoungMayor\AppResponse\Traits\ResponseBuilder;

class Web
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
        return Response::view('app-response::web-view', [
            'message' => $status,
            'status' => $statusCode,
            'with_status' => $statusCode > 299,
            'note' => $message,
            'title' => config('app.name'),
            'data' => $data
        ], $statusCode, $headers);
    }
}
