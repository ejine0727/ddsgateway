<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class User2Service
{
    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users2.base_uri');
        $this->secret = config('services.users2.secret');
    }

    public function createUser2($data)
    {
        return $this->performRequest('POST', '/api/users', $data);
    }
    public function obtainUsers2() // ✅ Added this method to fetch all users
    {
        return $this->performRequest('GET', '/api/users');
    }
    public function obtainUser2($id)
    {
        return $this->performRequest('GET', "/api/users/{$id}");
    }
    
    public function editUser2($data, $id) 
    {
        return $this->performRequest('PUT', "/api/users/{$id}", $data);
    }
    
    public function deleteUser2($id)
    {
        return $this->performRequest('DELETE', "/api/users/{$id}");
    }
}
