<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

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
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameToStore);
        } else {
            $path = null;
        }
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
    }

        return redirect('/users')->with('success', 'Data berhasil diupdate');


    }
}
