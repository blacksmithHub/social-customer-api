<?php

namespace App\Resources\Support\BaseContracts;

interface ShowInterface
{
    /**
     * GET request to the API show endpoint. 
     * 
     * @param array $headers
     * @param int $id
     * @param array $query
     * @return mixed
     */
    public function show(array $headers = [], int $id, array $query = []);
}
