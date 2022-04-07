<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'login';
    protected $allowedFields = ['name', 'email', 'password'];

    // public function saveUser($name, $email, $password){
    //     return $this->insert($data);
    // }
    


}