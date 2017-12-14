<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('user');

        return redirect('/')->with('success', 'Logged out');
    }

    public function login()
    {
        return view('login.login');
    }

    public function loginuser(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
      
        if (!Hash::check($request->input('password'),$user->password))
            return redirect('/login')->with('error', 'Incorrect email and password combination');
        else
            $request->session()->put('user', $user);
            return redirect('/posts')->with('success', 'Welcome back '.$user->name);
    }

    public function register()
    {
        return view('login.register');
    }

    public function registeruser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            
            'password' => 'required|same:confirmation',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->access_level = 0;
        $user->save();

        $request->session()->put('user', $user);
        return redirect('/posts')->with('success', 'Registered');
    }

    public function checkavailability(Request $request)
    {
        $email = $request->input('email');
        if (count(User::where('email', $email)->get()) > 0)
        {
            $jsonReply['availability'] = false;
        }
        else
        {
            $jsonReply['availability'] = true;
        }

        echo json_encode($jsonReply);
    }
}
