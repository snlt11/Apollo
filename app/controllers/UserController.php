<?php

namespace App\controllers;

use App\classes\CSRFToken;
use App\classes\Redirect;
use App\classes\Request;
use App\classes\Session;
use App\models\User;

class UserController
{
    public function login(){
        view('user.login');
    }
    public function postLogin(){
        $post = Request::get('post');
        beautify($post);
    }
    public function register(){
        view('user.register');
    }
    public function postRegister(): void
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
            if($post->password == $post->confirm_password){
                $rules = [
                    'name' => ['required'=>true,'minLength'=>3,'maxLength'=>25],
                    'email' => ['required'=>true,'email'=>true],
                    'password' => ['required'=>true,'minLength'=>8,'maxLength'=>32],
                    'confirm_password' => ['required'=>true,'minLength'=>8,'maxLength'=>32]
                ];
                $validation = new \App\classes\ValidationRequest();
                $validation->checkValidate($post,$rules);
                if($validation->hasErrors()){
                    beautify($validation->getErrors());
                }else{
                    $user = new User();
                    $user->name = $post->name;
                    $user->email = $post->email;
                    $user->password = password_hash($post->password, PASSWORD_DEFAULT);
                    $result = $user->save();
                    if($result){
                        Session::flashMessage('success', 'Registration successful');
                    }else{
                        Session::flashMessage('error', 'Failed to register');
                    }
                    Redirect::to('/user/register');
                }
            }else{
                Session::flashMessage('error', 'Passwords do not match',);
                Redirect::to('/user/register');
            }
        }else{
            Session::flashMessage('error', 'Invalid CSRF Token');
            Redirect::to('/user/register');
        }
    }
    public function logout(){

    }
}
