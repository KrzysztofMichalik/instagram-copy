@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3 px-5">
      <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">
    </div>
    <div class="col-9">
      <div class="d-flex justify-content-between align-items-baseline">
        <div class="d-flex align-items-center pb-2">
          <div class="h4">
            {{$user->username}}
          </div>
          {{-- user-id parameter is used as promises --}}
          {{-- <follow-button user-id="{{ $user->id }}"></follow-button> --}}
          <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
        </div>

      @can('update', $user->profile)
          <a href="/p/create">Add new Post</a>
      @endcan
      </div>
            {{-- if user is profile owner  --}}
      @can('update', $user->profile)
          <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
      @endcan
      <div class="d-flex">
        <div class="pr-5"><strong>{{ $user->posts->count()}} </strong> posts</div>
        <div class="pr-5"><strong>{{ $user->profile->followers->count()}} </strong> followers</div>
        <div class="pr-5"><strong>{{ $user->following->count()}} </strong> following</div>
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
