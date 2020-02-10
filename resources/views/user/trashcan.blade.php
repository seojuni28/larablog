@extends('backend.master')

@section('title' , 'User Management')

@section('sub-title')
<div class="section-header">
  <h1>Deleted Users</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{Route('user.index')}}">Users list</a></div>
    <div class="breadcrumb-item">Deleted Users</div>
  </div>
</div>
<div class="form-group bg-white row mb-4 p-1">
  <ul class="nav nav-pills mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{Route('user.trashcan')}}" data-toggle="tooltip" title="grid view"><i class="fas fa-th-large"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('user.trashlist')}}" data-toggle="tooltip" title="list view"><i class="fas fa-list-ul"></i></a>
    </li>
  </ul>
</div>
@endsection

@section('content')

<div class="section-body">
  <div class="row mb-3">
    @foreach($users as $user)
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="card">
          <div class="gallery gallery-fw" data-item-height="100">
          <div class="gallery-item" data-image="{{asset('public/uploads/user/'.$user->photo)}}"></div>
            </div>
          <div class="gallery-item gallery-hide" data-image="{{asset('public/uploads/user/'.$user->photo)}}" data-title="Image 4"></div>
          <div class="details p-2">
            <h5>{{$user->name}}</h5>
          <small><cite title="Source Title">{{$user->address}}<i class="icon-map-marker"></i></cite></small>
            </blockquote>
            <p>
            {{$user->email}}<br>
            {{$user->phone}}<br>
            </p>
            <p>
              <form action="{{Route('user.force-delete', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{Route('user.restore' , $user->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="unban"><i class="fas fa-recycle"></i></a>
                <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete permanent"><i class="fas fa-trash"></i></button>
            </form>
            </p>
          </div>
        </div>
      </div>
    @endforeach
    {{$users->links()}}
</div>
<script>
  const msg = '{{ Session::get('alert') }}';
  const exist = '{{ Session::has('alert')}}';

  if(exist){
    Notiflix.Notify.Success(msg);
  }
</script>
@endsection