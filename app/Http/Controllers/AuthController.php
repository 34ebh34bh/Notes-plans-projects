<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function RegisterPage(){
        return view('Auth.Register');
    }
    public function RegisterPost(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:8',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:255',
        ]);
        User::create($data);
        return redirect()->route('dashboard');
    }
    public function loginPage(){
        return view('Auth.Login');
    }
    public function loginPost(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = Auth::attempt([
            'password' => $data['password'],
            'email' => $data['email'],
        ]);
        if(!$user){
            abort(403);
        }
        else {
            return redirect()->route('dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('dashboard');
    }

     public function profilePage(user $user) {
        return view('Auth.profile', compact('user'));
     }

}
