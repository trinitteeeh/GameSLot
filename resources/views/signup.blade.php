@extends('layout.header')

@section('css')
<link rel="stylesheet" href="css/signup.css">
@endsection

@section('content')

<div class="container">
    <div class="form-container">
        <form class="form-pane" action={{ url('/signup') }} method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <h1>Sign Up</h1>
            <div class="form-group">
                <label class="  ">Name</label>
                <div class="form-input">
                    <input type="text" placeholder="Name" name="name">
                </div>
                @error('name')
                <strong class="error-msg"> {{ $message }} </strong>
                @enderror
            </div>

            <div class="form-group">
                <label class="  ">Email address</label>
                <div class="form-input">
                    <input type="text" placeholder="Email" name="email">
                </div>
                @error('email')
                <strong class="error-msg"> {{ $message }} </strong> @enderror
            </div>

            <div class="form-group">
                <label class="  ">Password</label>
                <div class="form-input">
                    <input type="password" placeholder="Password" name="password">
                </div>
                @error('password')
                <strong class="error-msg"> {{ $message }} </strong>
                @enderror
            </div>

            <div class="form-group">
                <label class="  ">Gender</label>
                <div class="form-input">
                    <input type="radio" name="toggle_group" value="Male" checked>
                    <label for="toggle-male">Male</label>
                    <input type="radio" name="toggle_group" value="Female">
                    <label for="toggle-female">Female</label>
                </div>
                @error('gender')
                <strong class="error-msg"> {{ $message }} </strong>
                @enderror
            </div>

            <div class="form-group">
                <label class="  ">Date of Birth</label>
                <div class="form-input">
                    <input type="date" placeholder="Date of Birth" name="dob">
                </div>
                @error('dob')
                <strong class="error-msg"> {{ $message }} </strong>
                @enderror
            </div>

            <div>
                <input class="submit-btn" type="submit" value="Sign Up">
            </div>
        </form>
    </div>
</div>

@endsection
