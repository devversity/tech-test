<?php

namespace App\Requests;

use App\Requests\Abstractions\GithubRequest;

/**
 * Concrete Request
 * Pull Starred Repositories
 *
 */
class StarredRepositoriesRequest extends GithubRequest
{
    /**
     * Request End point
     *
     * @var string
     */
    protected $endPoint = 'https://api.github.com/users/%s/starred';

    /**
     * Request type
     *
     * @var string
     */
    protected $requestType = 'GET';
}

