<?php

namespace App\VersionControl;

use App\VersionControl\Abstractions\AbstractHandler;

/**
 * Concrete Handler
 */
class Version2Handler extends AbstractHandler
{
    private $version = 2;

    public function handle(int $currentVersion)
    {
        // If we've hit the chosen version number, lets stop here
        // For me, we'd return a class which implements version 2
        if ($this->version === $currentVersion) {
            return 'Implementing version ' . $currentVersion;
        } else {
            return parent::handle($currentVersion); // Otherwise go proceed to the next handler.
        }
    }
}

