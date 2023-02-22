<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //show register form
    public function create(){
        return view('users.register');
    } 

    //create/store register form
    public function store(Request $request){
        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6', //validate if password is the same with a name with a _confirm in the form which is the confirm_password
        ]);

        //Hash Password
        $formfields['password'] = bcrypt($formfields['password']);

        //create a user
        $user = User::create($formfields);

        //login
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in');
    }

    //logout user
    public function logout(Request $request){
        auth()->logout(); //will perform logout

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    //show login form
    public function login(){
        return view('users.login');
    }

    // authenticate / login user
    public function authenticate(Request $request){
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required', //validate if password is the same with a name with a _confirm in the form which is the confirm_password
        ]);

        if(auth()->attempt($formfields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email'=>'Invalid credentials'])->onlyInput('email');

    }
}
