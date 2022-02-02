<?php

namespace App\VersionControl\Abstractions;

use App\VersionControl\Interfaces\HandlerInterface;

/**
 * The default chaining behaviour can be implemented inside a base handler class.
 */
abstract class AbstractHandler implements HandlerInterface
{
    /**
     * @var  Handler
     */
    private $nextHandler;

    /**
     * Set the next handler
     *
     * @param HandlerInterface $handler
     * @return HandlerInterface
     */
    public function setNext(HandlerInterface $handler)
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    /**
     * Handle the request
     *
     * @param int $currentVersion
     * @return null
     */
    public function handle(int $currentVersion)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($currentVersion);
        }

        return null;
    }
}

