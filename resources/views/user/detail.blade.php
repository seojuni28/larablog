@extends('backend.master')

@section('title' , 'Users')


@section('sub-title')
<div class="section-header">
  <h1>Users</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('user.index')}}">Users</a></div>
    <div class="breadcrumb-item">Users</div>
  </div>
</div>
@endsection

@section('content')
<div class="row col-12 p-0 m-0">
  <div class="col-md-4 col-lg-4">
    <div class="card">
      <div class="card-header">
      <card class="title"><h6>{{$user->name}}'s profile</h6></card>
      </div>
    <div class="card-body">
      <div class="gallery gallery-fw" data-item-height="150">
        <div class="gallery-item" data-image="{{asset('public/uploads/user/'.$user->photo)}}">
        </div>
      <div class="profile-widget-description">
      <div class="profile-widget-name">
        <label class="font-weight-bold">{{$user->name}}</label>
        <div class="text-muted d-inline font-weight-normal">
          <div class="slash"></div>{{$user->job}}</div>
        <div><label>{!! $user->bio !!}</label></div>
        </div>
      </div>
    </div>
    <div><i class="fas fa-envelope"></i> {{$user->email}}</div>
    <div><i class="fas fa-phone"></i> {{$user->phone}}</div>
    <div><i class="fas fa-map-marker-alt"></i> {{$user->address }}</div>
    <div><i class="fas fa-city"></i> {{$user->city }}</div>
    </div>
  </div>
  </div>
  <div class="col-md-8 col-lg-8">
    <div class="card">
      <div class="card-header">
        <card class="title">
          <h6 class="card-title">{{$user->name}}'s Articles</h6>
        </card>
      </div>
      <div class="card-body">
        <ul class="list-group">
        @foreach ($posts as $post)
          <li class="list-group-item"><a href="">{{$post->title}}</a> <span class="float-right">{{date('l, d F Y', strtotime($post->created_at))}}</span></li>
        @endforeach
        </ul>
      </div>
    {{$posts->links()}}
    </div>
  </div>
</div>
@endsection