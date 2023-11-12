<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function index(){
            $data = array(
                'id' => "posts",
                'menu' => 'Gallery',
                'galleries' => Post::where('picture', '!=','')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30)
            );
            
            return view('gallery.index')->with($data);
        }

    public function create(){
        $data = array(
            'id' => "posts",
            'menu' => 'Gallery',
        );
        return view('gallery.create')->with($data);
    }

    public function update(Request $request, $gallery){
        
        if ($request->hasFile('picture')) {
            $post = Post::findOrFail($gallery);
            $request->validate([
                'title' => 'required|string|max:250',
                'description' => 'required',
                'picture' => 'image|nullable|mimes:jpg,png,jpeg|max:2048',
            ]);            
            //delete image
            File::delete(public_path() ."/storage/posts_image/".$post->picture);
            File::delete(public_path() ."/storage/posts_image/large_".$post->picture);
            File::delete(public_path() ."/storage/posts_image/medium_".$post->picture);
            File::delete(public_path() ."/storage/posts_image/small_".$post->picture);
            // //delete post
            // $post->delete();
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);

            $request->file('picture')->storeAs("posts_image", $smallFilename);
            $request->file('picture')->storeAs("posts_image", $mediumFilename);
            $request->file('picture')->storeAs("posts_image", $largeFilename);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $smallFilename, 150, 93);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $mediumFilename, 300, 185);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $largeFilename, 550, 340);

            $post = Post::findOrFail($gallery);
            Post::where('id', $post->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'picture' => $filenameSimpan,
            ]);

        } else {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
            ]);
            $post = Post::findOrFail($gallery);
            Post::where('id', $post->id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        };
        return redirect()->route('gallery.index')->with('success', 'Data berhasil diupdate');
    }

    public function edit($gallery){
        $gallery = Post::findOrFail($gallery);
        $title = $gallery->title;
        $description = $gallery->description;
        $picture = $gallery->picture;
        return view('gallery.edit', compact('title', 'description', 'picture', 'gallery'));
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        //delete image
        File::delete(public_path() ."/storage/posts_image/".$post->picture);
        File::delete(public_path() ."/storage/posts_image/large_".$post->picture);
        File::delete(public_path() ."/storage/posts_image/medium_".$post->picture);
        File::delete(public_path() ."/storage/posts_image/small_".$post->picture);
        //delete post
        $post->delete();
        //redirect to index
        return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);
        
        
        if ($request->hasFile('picture')) {
            // dd($request->input());
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }
            $request->file('picture')->storeAs("posts_image", $smallFilename);
            $request->file('picture')->storeAs("posts_image", $mediumFilename);
            $request->file('picture')->storeAs("posts_image", $largeFilename);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $smallFilename, 150, 93);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $mediumFilename, 300, 185);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $largeFilename, 550, 340);

        // dd($request->input());
            $post = new Post;
            // dd($post);
            $post->picture = $filenameSimpan;
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            // dd($post);
            $post->save();
        return redirect('/gallery')->with('success', 'Berhasil menambahkan data baru');
    }

        public function createThumbnail($path, $width, $height)
        {
            $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
            $img->save($path);
        }

        public function show($id){
            // $data = array(
            //     'id' => "posts",
            //     'menu' => 'Gallery',
            //     'post' => Post::findOrFail($id)
            // );
            // return view('gallery.show')->with($data);
        }
}
