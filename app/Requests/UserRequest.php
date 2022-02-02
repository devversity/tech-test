<?php

namespace App\Requests;

use App\Requests\Abstractions\GithubRequest;

/**
 * Concrete Request
 * Pull User Information
 */
class UserRequest extends GithubRequest
{
    /**
     * Request End point
     *
     * @var string
     */
    protected $endPoint = 'https://api.github.com/users/%s';

    /**
     * Request type
     *
     * @var string
     */
    protected $requestType = 'GET';
}

