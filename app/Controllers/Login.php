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
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

            $data=[
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
            ];

            $model = new LoginModel();
            $query = $model->insert($data);

            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong');
            }else{
                return redirect()->to('login/loginpage')->with('success', 'Registration successful');
            }
        }
    }    

    
    public function loginpage(){
        echo view('templates/header');
        echo view('userlogin');
    }
    

        public function auth(){
        
        $validation = $this->validate([
            'email'=>[
                'rules'=>'required|valid_email',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=>'Enter a valid email',
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

            $session = session();
            $model = new LoginModel();
        
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = $model->where('email', $email)->first();

            if($data){
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if($verify_pass){
                    $session_data = [
                        'id'       => $data['id'],
                        'name'     => $data['name'],
                        'email'    => $data['email'],
                        'logged_in'     => TRUE
                    ];

                    $session->set($session_data);
                    return redirect()->to('/dashboard');
                }else{
                    $session->setFlashdata('msg', 'Wrong Password');
                    return redirect()->to('/login/loginpage');
                }
            }else{
                $session->setFlashdata('msg', 'This email is not registered');
                return redirect()->to('/login');
            }
            }

            }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login/loginpage');
    }




}