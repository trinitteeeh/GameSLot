@extends('layout.header')

@section('css')
<link rel="stylesheet" href="css/signin.css">
@endsection

@section('content')
<div class="container">
    <div class="form-container">
        <form class="form-pane" action={{ url('/signin') }} method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <h1>Sign In</h1>

            <div class="form-group">
                <label class="  ">Email address</label>
                <div class="form-input">
                    <input type="text" placeholder="Email" name="email">
                </div>
            </div>

            <div class="form-group">
                <label class="  ">Password</label>
                <div class="form-input">
                    <input type="password" placeholder="Password" name="password">
                </div>
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember_me">
                <label class="  ">Remember me</label>
            </div>

            <div>
                <input class="submit-btn" type="submit" value="Sign In">
            </div>
        </form>
    </div>
</div>
@endsection
