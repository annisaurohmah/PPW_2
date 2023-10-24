<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except (
            ['logout', 'dashboard', 'beranda']
        );
    }
    //hanya logout dan dashboard yang dapat diakses setelah login
    
    public function register()
    {
        return view('auth.register');
    }  

    public function beranda()
    {
        return view('beranda');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('email', 'password'); //mengambil email dan password dari form
        Auth::attempt($credentials); //mencoba login dengan email dan password yang diambil dari form
        $request->session()->regenerate(); //mengatur ulang session
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!'); //redirect ke halaman dashboard
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
            ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard(){
    if (Auth::check()) {
        return view('auth.dashboard');
    }

    return redirect()->route('login')
    ->withErrors([
        'email' => 'Please login to access this page.',
    ])->onlyInput('email');
    
}

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
        ->withSuccess('You have successfully logged out!');
    }
}
