<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

  // cosnstruct function check that user is logged.
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $following_users_id = auth()->user()->following()->pluck('profiles.user_id');

      $posts = Post::whereIn('user_id', $following_users_id)->latest()->paginate(5);
      // $posts = Post::whereIn('user_id', $following_users_id)->orderBy('created_at', 'DESC')->get();
      return view('posts.index', compact('posts'));
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
