<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function showSigninForm()
    {
        return view('signin');
    }

    public function showSignupForm()
    {
        return view('signup');
    }

    public function signout()
    {
        $carts = Session::get('carts');
        foreach ($carts as $cart) {
            unset($carts[$cart['id']]);
        }
        Auth::logout();
        return redirect('/');
    }

    public function signIn(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if ($request->remember_me) {
            Cookie::queue('name_cookie', $email, 5);
            Cookie::queue('password_cookie', $password, 5);
        } else {
            Cookie::queue('name_cookie', $email, -1);
            Cookie::queue('password_cookie', $email, -1);
        }
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return 'fail';
    }

    public function signUp(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $gender = $request->toggle_group;
        $dob = $request->dob;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'toggle_group' => 'required',
            'dob' => 'required|date|before:' . Carbon::now()->subYears(13)->toDateString()
        ]);

        User::insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'image' => 'null',
            'role' => 'user',
            'gender' => $gender,
            'dob' => $dob
        ]);

        return view('signin');
    }

    public function showProfilePage()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image'
        ]);

        if (Auth::user()->email != $request->email) {
            $request->validate([
                'email' => 'unique:users,email',
            ]);
        }

        $user = Auth::user();
        $image =  $request->file('image');

        if ($request->image !== null) {
            Storage::delete('public/profile/' . $user->image);
            Storage::putFileAs('public/profile/', $image, $image->getClientOriginalName());


            User::where('id', $user->id)->update([
                'name' => $request->name,
                'image' => $image->getClientOriginalName(),
                'email' => $request->email
            ]);
        } else {
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }
        return redirect()->back();
    }

    public function updateProfileAccount(Request $request)
    {
        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {

            $this->validate($request, [
                'new_password' => 'required_with:confirm_password|same:confirm_password'
            ]);


            User::where('id', $user->id)->update([
                'password' => bcrypt($request->new_password)
            ]);
        }

        return redirect()->back();
    }
}
