<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'login';
    protected $allowedFields = ['name', 'email', 'password'];

    // public function checkLogin($email,$password) {
    //     $sql="Select id, name, email from login where email='$email' AND password='$password'";
    //     $query = $this->db->query($sql);
    //     return $query->getRowArray();
    // }
    


}