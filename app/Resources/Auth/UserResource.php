<?php

namespace App\Resources\Auth;

use App\Resources\Resource;
use App\Resources\Contracts\Auth\UserResourceInterface;

class UserResource extends Resource implements UserResourceInterface
{
    /**
     * Create the source instance and declare the route endpoint.
     *
     */
    public function __construct()
    {
        $this->route = sprintf('%s/api/client/users', config('services.auth.url'));
    }
}
