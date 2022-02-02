<?php

namespace App\Requests\Abstractions;

use App\Requests\Interfaces\RequestInterface;

use Illuminate\Support\Facades\Http;

/**
 * Abstract Request
 * Used to prevent duplicate boilerplate code.
 *
 */
abstract class GithubRequest implements RequestInterface
{
    /**
     * Request parameters
     *
     * @var array
     */
    protected $requestParameters = [];

    /**
     * Request Endpoint
     *
     * @var string
     */
    protected $endPoint = null;

    /**
     * Request Type
     *
     * @var null
     */
    protected $requestType = null;

    /**
     * Sets the request parameters
     *
     * @param array $requestParameters
     * @return $this
     */
    public function parameters(array $requestParameters)
    {
        $this->requestParameters = $requestParameters;

        return $this;
    }

    /**
     * Execute a request and return the response
     *
     * @return string
     */
    public function request()
    {
        // If we've got no endpoint or username, lets return early
        if (
            empty($this->endPoint) ||
            empty($this->requestParameters['username'])
        ) {
            return;
        }

        // Update the endpoints and inject the username
        $this->endPoint = sprintf($this->endPoint, $this->requestParameters['username']);

        // Default response
        $response = null;

        switch ($this->requestType) {
            case "GET":
                $response = Http::get($this->endPoint)->body();
                break;
            case "POST":
                $response = Http::post($this->endPoint, $this->requestParameters)->body();
                break;
            case "PUT":
                $response = Http::put($this->endPoint, $this->requestParameters)->body();
                break;
            case "PATCH":
                $response = Http::patch($this->endPoint, $this->requestParameters)->body();
                break;
            case "DELETE":
                $response = Http::delete($this->endPoint, $this->requestParameters)->body();
                break;
        }

        return json_decode($response);
    }
}

