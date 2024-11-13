<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function registerView(){
        return view('auth.register');
    }

    public function login(LoginRequest $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }

        return back()->with('fail','Kredencialet e gabuara');
    }

    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login-view');
    }
}
