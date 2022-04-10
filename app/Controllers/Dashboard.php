<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // echo "Welcome to dashboard";
        echo view('templates/header');
        echo view('dashboard');
    }
}
