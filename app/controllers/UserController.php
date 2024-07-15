<?php

namespace App\controllers;

use App\classes\CSRFToken;
use App\classes\Redirect;
use App\classes\Request;
use App\classes\Session;
use App\models\User;
use JetBrains\PhpStorm\NoReturn;

class UserController
{
    public function login(): void
    {
        view('user.login');
    }
    #[NoReturn] public function postLogin(){
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
            $user = User::where('email', $post->email)->first();
            if($user){
                if(password_verify($post->password, $user->password)){
                    Session::set('user_id', $user->id);
                    Redirect::to('/');
                }else{
                    Session::flashMessage('error', 'Incorrect password');
                    Redirect::to('/user/login');
                }
            }else{
                Session::flashMessage('error', 'There is no user with this email');
                Redirect::to('/user/login');
            }
        }else{
            Session::flashMessage('error', 'Invalid CSRF Token');
            Redirect::to('/user/login');
        }
    }
    public function register(): void
    {
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
    #[NoReturn] public function logout(): void
    {
        Session::unset('user');
        session_destroy();
        Redirect::to('/user/login');
    }
}
