@extends('layouts.master')

@section('title',"User Register")

@section('content')
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <h1 class="my-4 text-center">User Register</h1>
            @if(\App\classes\Session::has('error'))
                {{ \App\classes\Session::flashMessage('error') }}
            @endif
            @if(\App\classes\Session::has('success'))
                {{ \App\classes\Session::flashMessage('success') }}
            @endif
            <form method="post" action="/user/register">
                <input type="hidden" name="token" value="{{ \App\classes\CSRFToken::__token()}}">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <br><br>
                <p>
                    Already member?
                    <a href="/user/login">Login</a>
                </p>

            </form>
        </div>
    </div>
@endsection