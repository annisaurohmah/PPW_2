<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $data_users = User::all();
        return view('post.users', compact('data_users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        $name = $users->name;
        $email = $users->email;
        $photo = $users->photo;
        return view('post.edit', compact('name', 'email', 'photo', 'users'));
    }

    public function destroy($id) {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found');
        }
    
        $photo = $user->photo;
    
        // Hapus gambar asli
        $originalPath = public_path('storage/photos/original/' . $photo);
        if (File::exists($originalPath)) {
            File::delete($originalPath);
        }
    
        // Hapus thumbnail
        $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }
    
        // Hapus versi persegi
        $squarePath = public_path('storage/photos/square/' . $photo);
        if (File::exists($squarePath)) {
            File::delete($squarePath);
        }
    
        // Hapus data pengguna
        $user->delete();
    
        return redirect()->back()->withSuccess('You have successfully deleted data!');
    }
    
    
    public function update(Request $request, $id){      
        
        if ($request->hasFile('photo')) {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|max:255|email:dns|unique:users,email,' . $id,
                'photo' => 'image|nullable|mimes:jpg,png,jpeg|max:2048',
            ]);

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

            $image = $request->photo;
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $user = User::find($id);
            $photo = $user->photo; 

            // Hapus gambar asli
            $originalPath = public_path('storage/photos/original/' . $photo);
            if (File::exists($originalPath)) {
                File::delete($originalPath);
            }
            //simpan gambar asli
            $path = $request->file('photo')->storeAs('photos/original', $filenameToStore);


            $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }
            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameToStore);
            Image::make($image)
                ->fit(100, 100)
                ->save($thumbnailPath);

            $squarePath = public_path('storage/photos/square/' . $photo);
            if (File::exists($squarePath)) {
                File::delete($squarePath);
            }
            // Buat versi persegi dengan lebar dan tinggi yang sama
            $squarePath = public_path('storage/photos/square/' . $filenameToStore);
            Image::make($image)
                ->fit(200, 200)
                ->save($squarePath);

            $path = $filenameToStore;
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $path,
            ]);

        } else {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|max:255|email:dns|unique:users,email,' . $id,
            ]);
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        };
        return redirect('/users')->with('success', 'Data berhasil diupdate');

    }
}
