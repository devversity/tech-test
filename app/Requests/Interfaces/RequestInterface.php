<?php

namespace App\Requests\Interfaces;

/**
 * Basic Request Interface
 */
interface RequestInterface  {
    /**
     * Set parameters
     *
     * @param array $requestParameters
     *
     * @return $this
     */
    public function parameters(array $requestParameters);

    /**
     * Execute request
     *
     * @return $response
     */
    public function request();
}

