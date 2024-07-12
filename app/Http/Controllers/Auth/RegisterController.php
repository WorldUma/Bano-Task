<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('auth.registeration');
    }

    public function store(Request $request){
       
            $request->validate([
        'name' => [
            'required',
            'regex:/^[a-zA-Z\s]+$/u',
            'min:1',
            'max:255',
        ],
        'email' => [
            'required',
            'email',
            'unique:users,email',
            'max:255',
        ],
        'password' => [
            'required',
            'string',
            'min:8',
            'max:255',
        ],
    ], [
        'name.required' => 'The name field is required.',
        'name.regex' => 'The name may only contain letters and spaces.',
        'name.min' => 'The name must be at least 1 character.',
        'name.max' => 'The name may not be greater than 255 characters.',
        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'email.unique' => 'The email has already been taken.',
        'email.max' => 'The email may not be greater than 255 characters.',
        'password.required' => 'The password field is required.',
        'password.string' => 'The password must be a string.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.max' => 'The password may not be greater than 255 characters.',
    ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
        $user->save();
         Session::flash('success', 'User registered successfully');
        return redirect()->back();
    }
}
