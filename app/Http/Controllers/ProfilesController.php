<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
  // we can refactor function index. First thing to do is changes parameter, second delete checker findOrFail and third one is use compact function to pass data to controller. I leave function as it is, in education purpouse.
  public function index($user)
  {
    $user = User::findOrFail($user);
    // przekazywanie danych do widoku.
    return view('profiles.index',[
                'user'=>$user
              ]);
  }



  public function edit(\App\User $user)
  {
    $this->authorize('update', $user->profile);
    return view('profiles.edit', compact('user'));
  }



  public function update(\App\User $user)
  {
    $this->authorize('update', $user->profile);
    $data = request()->validate([
      'title' => 'required',
      'description' => 'required',
      'url' => 'url',
      'image' => '',
    ]);

    // Picture edition
    if (request('image')){
      // save picture as it was.
      $imagePath = request('image')->store('profile', 'public');

      $image = Image::make(public_path("storage/{$imagePath}"))->fit(100, 100);
      $image->save();
      $imageArray = ['image' => $imagePath];

    }

    // we have to change image value in $data array, so I chose array_merge function.
    auth()->user()->profile->update(array_merge(
      $data,
      $imageArray ?? []
    ));

    return redirect("/profile/{$user->id}");
  }
}
