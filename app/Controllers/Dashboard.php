<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if(!session()->has('logged_in')){
            return redirect()->to('/login/loginpage');
        }
        echo view('templates/header');
        echo view('dashboard');
    }
}
