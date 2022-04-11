<?php

namespace App\Controllers;

class UserProfile extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('profile');
    }
}
