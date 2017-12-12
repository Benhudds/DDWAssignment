<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Models\Register;
use \App\User;

class UserController extends Controller
{
    public function authAdmin(Request $request)
    {
        if (!$request->session()->has('user'))
            return false;

        $user = $request->session()->get('user');
        if ($user->access_level == 2)
            return true;

        return false;
    }

    public function authUser(Request $request, User $user)
    {
        if (!$request->session()->has('user'))
        return false;

        $sessuser = $request->session()->get('user');
        if ($sessuser->id == $user->id or $sessuser->access_level == 2)
            return true;

        return false;
    }

    public function index(Request $request)
    {
        if (!$request->session()->has('user'))
            return redirect('/login')->with('error', 'Unauthorized, please log in');

        $user = $request->session()->get('user');
        if (!$user->access_level == 2)
            return redirect('/login')->with('error', 'Unauthorized, log in as administrator');

        $users = User::orderBy('email', 'asc')->paginate(50);
        return view('users.index')->with('users', $users);
    }

    public function filter(Request $request)
    {
        if (!$this->authAdmin($request))
            return redirect('/login')->with('error', 'Unauthorized, log in as administrator');

        $filter = $request->input('access_level');
        if ($filter != null and $filter != -1)
            $users = User::where('access_level',$filter)->orderBy('email', 'asc')->paginate(50);
        else
            $users = User::orderBy('email', 'asc')->paginate(50);

        return view('users.filtered')->with('users', $users);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if (!$this->authUser($request, $user))
            return redirect('/login')->with('error', 'Unauthorized');
        
        return view('users.edit')->with('user', $user);
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        if (!$this->authUser($request, $user))
            return redirect('/login')->with('error', 'Unauthorized');
        
        return view('users.show')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$this->authUser($request, $user))
            return redirect('/login')->with('error', 'Unauthorized');

        $this->validate($request, [
            'name' => 'required',
            'password' => 'same:confirmation'
        ]);

        // Create post
        $user->name = $request->input('name');
        if ($request->input('password') != "")
            $user->password = Hash::make($request->input('password'));

        $user->access_level = $request->input('access_level');

        $user->save();

        return redirect('/users/'.$id)->with('success', 'User Updated');
    }

    public function create()
    {
        return redirect('/register');
    }
}
