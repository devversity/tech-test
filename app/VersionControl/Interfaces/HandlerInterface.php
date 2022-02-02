<?php

namespace App\VersionControl\Interfaces;

/**
 * Basic Handler Interface
 */
interface HandlerInterface  {

    public function setNext(HandlerInterface $handler);
    public function handle(int $currentVersion);
}

