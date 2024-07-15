@extends('layouts.master')

@section('title',"User Login")

@section('content')
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <h1 class="my-5 text-center">User Login </h1>
            <form method="post" action="/user/login">
                @if(\App\classes\Session::has('error'))
                    {{ \App\classes\Session::flashMessage('error') }}
                @endif
                @if(\App\classes\Session::has('success'))
                    {{ \App\classes\Session::flashMessage('success') }}
                @endif
                <input type="hidden" name="token" value="{{ \App\classes\CSRFToken::__token()}}">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <br><br>
                <p>
                    Not yet member?
                    <a href="/user/register">Register</a>
                </p>

            </form>
        </div>
    </div>
@endsection