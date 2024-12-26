<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
class UserController extends Controller
{
    public function loginFrom(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'phone' => 'required',
            'password' => 'required|string'
        ]);

        if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
            return redirect()->intended('ofer');
        }
        return redirect()->back();
    }

    public function registterForm(){
        return view('register');
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('root');
    }

    public function register(Request $request) {
        $request->validate([
            'login' => 'required|string|max:255',
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'login' => $request->login,
            'full_name'=> $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',


        ]);
        Auth::login($user); //не нужна
        event(new Registered($user));
        return redirect('login');
    }

}
