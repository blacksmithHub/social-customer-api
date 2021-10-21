<?php

namespace App\Resources;

use App\Resources\Contracts\ResourceInterface;
use App\Resources\Support\ApiResource;

abstract class Resource implements ResourceInterface
{
    use ApiResource;

    /**
     * The route for the API.
     * 
     * @var string
     */
    protected $route;

    /**
     * Create the class instance and inject its dependency.
     * 
     * @param String $route
     */
    public function __construct(string $route)
    {
        $this->route = $route;
    }

    /**
     * Get the route for the API endpoint.
     * 
     * @return string
     */
    public function route()
    {
        return $this->route;
    }
}
