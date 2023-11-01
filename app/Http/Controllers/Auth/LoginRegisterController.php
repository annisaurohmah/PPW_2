<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class LoginRegisterController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except (
            ['logout', 'dashboard']
        );
    }
    //hanya logout dan dashboard yang dapat diakses setelah login
    
    public function register()
    {
        return view('auth.register');
    }  
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|max:255|email:dns|unique:users',
            'password' => 'required|min:8|confirmed',
            'photo' => 'image|nullable|mimes:jpg,png,jpeg|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos/original', $filenameToStore);
            // Simpan gambar asli
            
            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameToStore);
            Image::make($image)
                ->fit(100, 100)
                ->save($thumbnailPath);

            // Buat versi persegi dengan lebar dan tinggi yang sama
            $squarePath = public_path('storage/photos/square/' . $filenameToStore);
            Image::make($image)
                ->fit(200, 200)
                ->save($squarePath);

            $path = $filenameToStore;
        } else {
            $path = null;
        }

        

        User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'photo' => $path,
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
            'email' => 'required|email:dns',
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