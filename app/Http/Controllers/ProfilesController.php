<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;

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


    if (request('image')){
      $imagePath = request('image')->store('profile', 'public');

      $image = Image::make(public_path("storage/{$imagePath}"))->fit(100, 100);
      $image->save();

    }
    dd(  auth()->user()->profile->update(array_merge(
        $data,
        ['image' => $imagePath]
      )));
    auth()->user()->profile->update(array_merge(
      $data,
      ['image' => $imagePath]
    ));

    return redirect("/profile/{$user->id}");
  }
}
