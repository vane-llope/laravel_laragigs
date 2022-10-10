<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register form
    public function create(){
        return view('users.register');
    }

    //store user info in DB
    public function store(Request $request){
       $formFields = $request -> validate([
        'name' => ['required','min:3'],
        'email' => ['required','email',Rule::unique('users','email')],
        'password' => ['required','confirmed','min:6']
       ]);
       
       //hash password
       $formFields['password'] = bcrypt($formFields['password']);
       //create user
       $user = User::create($formFields);
       //login
       auth()->login($user);
       return redirect('/')->with('message','User Created And Logged In');
    }

    //show login form
    public function login(){
      return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request){
        $formFields = $request -> validate([
            'email' => ['required','email'],
            'password' => 'required'
           ]);
           if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You Are Logged In');
           }
           return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //logout user
    public function logout(Request $request){
         auth()->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect('/')->with('message','You Have Been Logged Out');
    }
}
