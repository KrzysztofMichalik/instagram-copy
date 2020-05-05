<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
  public function index($user)
  {
    $user = User::find($user);
    // przekazywanie danych do widoku.
    return view('home',[
                'user'=>$user
              ]);
  }
}
