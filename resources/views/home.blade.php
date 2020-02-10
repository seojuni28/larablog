@extends('backend.master')

@section('title' , 'Dashboard')

@section('sub-title')
<div class="section-header">
  <h1>Dashboard</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item">Dashboard</div>
  </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
            <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Total Users</h4>
            </div>
            <div class="card-body">
            {!! $users->count() !!}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Articles</h4>
            </div>
            <div class="card-body">
            {!! $posts->count() !!}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-success">
            <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Active Users</h4>
            </div>
            <div class="card-body">
                {!! $active->count() !!}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
            <i class="fas fa-user-slash"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Banned Users</h4>
            </div>
            <div class="card-body">
            {{$banned->count()}}
            </div>
        </div>
        </div>
    </div>                  
</div>
<div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>New Articles</h4>
        </div>
        <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                @foreach ($posts as $post)
                <li class="media">
                    <img class="mr-3 rounded-circle" width="50" height="50" src="{{asset('public/uploads/posts/'.$post->photo)}}" alt="avatar">
                    <div class="media-body">
                        <div class="float-right text-primary">{{$post->created_at->diffForHumans()}}</div>
                    <div class="media-title">{{$post->user->name}} | <span class="text-primary">{{$post->title }}</span> </div>
                        <span class="text-small text-muted">{!! Str::limit($post->content,100) !!}</span>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="text-center pt-1 pb-1">
                <a href="{{route('list')}}" class="btn btn-primary btn-lg btn-round">
                    View All
                </a>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>New user</h4>
        </div>
        <div class="card-body">             
          <ul class="list-unstyled list-unstyled-border">
            @foreach ($users as $user)
            <li class="media">
            <img class="mr-3 rounded-circle" width="50" height="50" src="{{asset('public/uploads/user/'.$user->photo)}}" alt="avatar">
                <div class="media-body">
                <div class="float-right text-primary">{{$user->created_at->diffForHumans()}}</div>
                <div class="media-title">{{$user->name}}</div>
                <span class="text-small text-muted">{{$user->address}}</span>
                </div>
            </li>
            @endforeach
          </ul>
          <div class="text-center pt-1 pb-1">
          <a href="{{route('user-list')}}" class="btn btn-primary btn-lg btn-round">
              View All
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
