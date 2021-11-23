<?php

namespace YoungMayor\AppResponse;

use Illuminate\Support\Facades\Response;
use YoungMayor\AppResponse\Traits\ResponseBuilder;

class API
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

        $responseData = [
            'status' => $status,
            'statusCode' => $statusCode,
            'message' => $message,
        ];

        if (!empty($data)) {
            $responseData[$dataKey] = $data;
        }

        return Response::json($responseData, $statusCode, $headers);
    }
}
