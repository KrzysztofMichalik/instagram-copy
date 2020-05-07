@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3 px-5">
      <img src="../assets/img/hammster.jpg" style='height: 80px; border-radius:50%;' alt="">
    </div>
    <div class="col-9">
      @can('update', $user->profile)
        <div class="d-flex justify-content-between align-items-baseline">
          <h1>{{$user->username}}</h1>
          <a href="/p/create">Add new Post</a>
        </div>
      @endcan
        {{-- if user is profile owner  --}}
      @can('update', $user->profile)
        <div>
          <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
        </div>
      @endcan
      <div class="d-flex">
        <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
        <div class="pr-5"><strong>123</strong> followers</div>
        <div class="pr-5"><strong>123</strong> following</div>
      </div>
      <div class="pt-4 font-weight-bold">{{ $user->profile->title}}</div>
      <div>{{ $user->profile->description }}</div>

      <a href="#">{{ $user->profile->url}}</a>
    </div>
  </div>
  <div class="row pt-5">
    @foreach ($user->posts as $post)
      <div class="col-4 pb-5">

          <a href="/p/{{ $post->id }}">
            <img src="/storage/{{$post->image}}" class="w-100">
          </a>
      </div>
    @endforeach
  </div>
</div>
@endsection
