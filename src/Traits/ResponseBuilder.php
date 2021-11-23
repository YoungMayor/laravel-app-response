<?php

namespace YoungMayor\AppResponse\Traits;

use Illuminate\Http\Resources\Json\JsonResource;

trait ResponseBuilder
{
    /**
     * Generates a  custom response for a request
     *
     * @param string $message
     * @param mixed $data
     * @param integer $statusCode
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function customResponse(
        string $message,
        $data = [],
        $statusCode = 200
    ) {
        return $this->buildResponse(
            $message,
            '',
            $statusCode,
            $data
        );
    }

    /**
     * Generates a success response for a request
     *
     * @param string $message
     * @param mixed $data
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function success(
        string $message,
        $data = []
    ) {
        return $this->buildResponse(
            $message,
            'success',
            config('app-response.codes.ok'),
            $data
        );
    }

    /**
     * Generates a resource created response for a request
     *
     * @param string $message
     * @param mixed $data
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function created(
        string $message,
        $data = []
    ) {
        return $this->buildResponse(
            $message,
            'created',
            config('app-response.codes.created'),
            $data
        );
    }

    /**
     * Generates a resource created response for a request
     *
     * @param string $message
     * @param mixed $data
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function noContent()
    {
        return $this->buildResponse(
            '',
            '',
            config('app-response.codes.no_content')
        );
    }

    /**
     * Generates a failed Data Creation response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function failedDataCreation(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.bad_request')
        );
    }

    /**
     * Generates an unauthorized response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function unauthorized(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.unauthorized')
        );
    }

    /**
     * Generates an unnprocessable entity response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function unprocessable(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.unprocessable_entity')
        );
    }

    /**
     * Generates a forbidden response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function forbidden(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.forbidden')
        );
    }

    /**
     * Generates a not found response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function notFound(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.not_found')
        );
    }

    /**
     * Generates a method not found response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function methodNotAllowed(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.method_not_found')
        );
    }

    /**
     * Generates an action not accepted response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function notAccepted(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.not_accepted')
        );
    }

    /**
     * Generates a conflict error response for a request
     *
     * @param string $message
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function conflict(string $message)
    {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.conflict')
        );
    }

    /**
     * Generates a not found response for a request
     *
     * @param string $message
     * @param mixed $errors
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function failedValidation(
        string $message,
        $errors = []
    ) {
        return $this->buildResponse(
            $message,
            'failed',
            config('app-response.codes.validation_error'),
            $errors,
            [],
            'errors'
        );
    }

    /**
     * Generates a not found response for a request
     *
     * @param string $message
     * @param mixed $errors
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function serverError(string $message)
    {
        return $this->buildResponse(
            $message,
            'server-error',
            config('app-response.codes.server_error'),
            [],
            [],
            'errors'
        );
    }

    /**
     * Generates a paginated response for a request
     *
     * @param object $pageObject
     * @param JsonResource $resource
     * @param string $message
     * @param boolean $withLastPage
     * 
     * @return \Illuminate\Support\Facades\Response
     */
    public function paginated(
        $pageObject,
        JsonResource $resource,
        $message = '',
        $withLastPage = true
    ) {
        if ($withLastPage) {
            $data = [
                'last_page' => $pageObject && $pageObject->toArray() ? $pageObject->toArray()['last_page'] ?? 1 : 1
            ];
        }

        if ($pageObject && count($pageObject)) {
            $data['payload'] = $resource::collection($pageObject);
        }

        return $this->buildResponse(
            $message,
            'success',
            config('app-response.codes.ok'),
            $data
        );
    }

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
    abstract protected function buildResponse(
        string $message,
        string $status,
        int $statusCode,
        $data = null,
        array $headers = [],
        string $dataKey = 'data'
    );
}
