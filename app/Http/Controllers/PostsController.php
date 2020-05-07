<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // cosnstruct function check that user is logged.
      public function __construct()
      {
        $this->middleware('auth');
      }

      // function create points to public/posts/create view
    public function create()
    {
      return view('posts.create');
    }
    // function store save ouer post into database, end redirect to profile view.
    public function store()
    {
      // dd(request()->all());
      $data = request()->validate([
          'caption' => 'required',
          // 'image' => 'required|image',
          'image' => ['required', 'image']
      ]);

      $imagePath = request('image')->store('uploads', 'public');

      $image = Image::make(public_path("storage/{$imagePath}"))->fit(200, 200);
      $image->save();


       auth()->user()->posts()->create([
         'caption' => $data['caption'],
         'image' => $imagePath,
       ]);

       return redirect('/profile/' . auth()->user()->id);
    }

    // Route Model Binding
    public function show(\App\Post $post)
    {
      // return view('posts.show', [
      //   'post' => $post,
      // ]);

      // The following entry is identical to the previous one. It only change passing parameter way.
      return view('posts.show', compact('post'));

    }
}
