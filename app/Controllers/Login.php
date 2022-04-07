<?php

namespace App\Controllers;
// namespace App\Models;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function __construct(){
        helper(['form','url']);

    }
    
    public function index(){
        echo view('templates/header');
        echo view('signup');
    }
    
    public function signup_action(){

        $validation = $this->validate([
            'name'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Full name is required'
                ]
                ],
            'email'=>[
                'rules'=>'required|valid_email|is_unique[login.email]',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=>'You must enter a valid email',
                    'is_unique'=>'Email is already exists',
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[8]',
                'errors'=>[
                    'required'=>'password is required',
                    'min_length'=>'password must have atleast 8 character in length'
                ]
                ],
            'cpassword'=>[
                'rules'=>'required|matches[password]',
                'errors'=>[
                    'required'=>'confirm password is required',
                    'matches'=>'confirm password not match with password'
                ]
                ],
            ]);

        if(!$validation){
            echo view('templates/header');
            echo view('signup', ['validation'=>$this->validator]);
        }else{
            // insert data into database
            $name = $this->request->getVar('name');
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data=[
                'name'=>$name,
                'email'=>$email,
                'password'=>md5($password)
            ];

            $model = new LoginModel();
            $query = $model->insert($data);

            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong');
            }else{
                return redirect()->to('login')->with('success', 'Registration successful');
            }
        }
    }    

    
    public function loginpage(){
        echo view('templates/header');
        echo view('userlogin');
    }
    
    
    public function login_action(){
        $validation = $this->validate([
            'email'=>[
                'rules'=>'required|valid_email|is_not_unique[login.email]',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=>'Enter a valid email',
                    'is_not_unique'=>'This email is not registered',
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[8]',
                'errors'=>[
                    'required'=>'password is required',
                    'min_length'=>'password must have atleast 8 character in length'
                ]
                ]
        ]);

        if(!$validation){
            echo view('templates/header');
            echo view('userlogin', ['validation'=>$this->validator]);
        }else{
            echo "success";

        }
    }
}