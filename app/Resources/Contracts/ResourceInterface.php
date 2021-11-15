<?php

namespace App\Resources\Contracts;

interface ResourceInterface
{
    /**
     * Get the route for the API endpoint.
     * 
     * @return string
     */
    public function route();
}
