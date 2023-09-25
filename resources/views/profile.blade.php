@extends('layout.header')

@section('css')
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="css/profile.css">

@endsection

@section('content')

<div class="container">
    <div class="form-container">
        <form action={{ url('/profile') }} method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="form-pane">
                <thead>
                    <tr>
                        <th colspan="3">
                            <div style="display: flex; justify-content: start; align-item:center">
                                <h1 sytle=" grid-column: 1 / span 2;">Profile</h1>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label class="  ">Name</label></td>
                        <td colspan="2"><input type="text" placeholder="Name" name="name"
                                value="{{ Auth::user()->name }}">
                        </td>
                    </tr>
                    <tr>
                        <td><label class="  ">Photo</label></td>
                        <td>
                            <div class="image-container">
                                <div class="image-pane">
                                    @if(Auth::user()->image == 'null')
                                    <img src="{{ url('storage/profile/no-profile.png') }}" alt="profile">
                                    @else
                                    <img src="{{url('storage/profile/'.Auth::user()->image)}}" alt="img">
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td><input type="file" placeholder="Choose" name="image"></td>
                    </tr>
                    <tr>
                        <td><label class="  ">Email</label></td>
                        <td colspan="2"><input type="text" placeholder="Email" name="email"
                                value="{{ Auth::user()->email }}"></td>
                    </tr>
                    <tr>
                        <td><label class="   ">Gender</label></td>
                        <td colspan="2">{{ Auth::user()->gender }}</td>
                    </tr>
                    <tr>
                        <td><label class="   ">Date of Birth</label></td>
                        <td colspan="2">{{ Auth::user()->dob }}</td>
                    </tr>
                </tbody>
            </table>
            <div style=" display: flex; justify-content:end">
                <input class="submit-btn" type="submit" value="Update">
            </div>
        </form>
    </div>

    <div class="form-container">
        <form action={{ url('/profile/account') }} method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="form-pane">
                <thead>
                    <tr>
                        <th colspan="3">
                            <div style="display: flex; justify-content: start; align-item:center">
                                <h1 sytle=" grid-column: 1 / span 2;">Account</h1>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label class="  ">Old Password</label></td>
                        <td colspan="2"><input type="password" placeholder="Old Password" name="old_password">
                        </td>
                    </tr>
                    <tr>
                        <td><label class="  ">New Password</label></td>
                        <td colspan="2"><input type="password" placeholder="New Password" name="new_password">
                        </td>
                    </tr>
                    <tr>
                        <td><label class="  ">Confirm Password</label></td>
                        <td colspan="2"><input type="password" placeholder="Confirm Password" name="confirm_password">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style=" display: flex; justify-content:end">
                <input class="submit-btn" type="submit" value="Update">
            </div>
        </form>
    </div>
</div>

@endsection
