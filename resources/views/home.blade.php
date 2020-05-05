@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3 px-5">
      <img src="../assets/img/hammster.jpg" style='height: 80px; border-radius:50%;' alt="">
    </div>
    <div class="col-9">
      <div>
        <h1>{{$user->username}}</h1>
      </div>
      <div class="d-flex">
        <div class="pr-5"><strong>123</strong> posts</div>
        <div class="pr-5"><strong>123</strong> followers</div>
        <div class="pr-5"><strong>123</strong> following</div>
      </div>
      <div class="pt-4 font-weight-bold">Fancy hammster</div>
      <div>I am the most fancy hammster in the world. Look at me I'am cute but crazy!</div>
      <a href="#">www.fancy-hammster.com</a>
    </div>
  </div>
  <div class="row pt-5">
    <div class="col-4">
      <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/efb61917-c3d4-4b9f-8edb-030bb2ff2456/d1itepw-95e7197d-57ca-46aa-956e-2935ac4eaf22.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2VmYjYxOTE3LWMzZDQtNGI5Zi04ZWRiLTAzMGJiMmZmMjQ1NlwvZDFpdGVwdy05NWU3MTk3ZC01N2NhLTQ2YWEtOTU2ZS0yOTM1YWM0ZWFmMjIuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.H1zuFFKhCoYDBUyhyui63CWXCq1dm9PjWTsNh4xvQag" class="w-100 main_images">
    </div>
    <div class="col-4">
      <img src="https://www.meme-arsenal.com/memes/d0197e016fb123f457415a4face92cf0.jpg" class="w-100 main_images">
    </div>
    <div class="col-4">
      <img src="https://live.staticflickr.com/1227/541401315_315abbc47a_z.jpg" class="w-100 main_images">
    </div>
  </div>
</div>
@endsection
