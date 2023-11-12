<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendEmail;
use App\Jobs\SendMailJob;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


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
            'photo' => 'image|nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        

        $content = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => "Registrasi Berhasil",
                    'body' => "Akun Anda berhasil terdaftar di website Portofolio Annisa Urohmah",
                ];
        
                if ($request->hasFile('photo')) {
                    $image = $request->file('photo');
        
        
                    $folderPathOriginal = public_path('storage/photos/original');
                    $folderPathThumbnail = public_path('storage/photos/thumbnail');
                    $folderPathSquare = public_path('storage/photos/square');
        
                    if (!File::isDirectory($folderPathOriginal)) {
                        File::makeDirectory($folderPathOriginal, 0777, true, true);
                    }
                    if (!File::isDirectory($folderPathThumbnail)) {
                        File::makeDirectory($folderPathThumbnail, 0777, true, true);
                    }
                    if (!File::isDirectory($folderPathSquare)) {
                        File::makeDirectory($folderPathSquare, 0777, true, true);
                    }
        
        
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
        dispatch(new SendMailJob($content));
        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!'); //redirect ke halaman dashboard

    
        
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
